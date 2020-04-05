<?php

namespace App\Models\Characters;

use App\Events\CharacterDeleting;
use App\Interfaces\ItemContainer;
use App\Interfaces\Targetable;
use App\Models\Core\CharacterAbility;
use App\Models\Core\CharacterSkill;
use App\Models\Core\Environment;
use App\Models\Core\Race;
use App\Models\Core\Size;
use App\Models\Core\Dice;
use App\Models\Core\Alignment;
use App\Models\Items\Action;
use App\Models\Items\Item;
use App\Models\Language\Language;
use App\Sense;
use App\Traits\ModelItemContainerTrait;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SearchableTrait;
use App\Traits\FilterableTrait;
use Illuminate\Support\Arr;
use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

class Character extends Model implements Targetable, ItemContainer
{
    use SingleTableInheritanceTrait;
    use SearchableTrait;
    use FilterableTrait;
    use ModelItemContainerTrait;

    protected $table = 'characters';

    protected static $singleTableType = 'unknown';
    protected static $singleTableTypeField = 'type';
    protected static $singleTableSubclasses = [Monster::class, Player::class];

    public $guarded = ['id'];

    protected $dispatchesEvents = [
        'deleting' => CharacterDeleting::class,
    ];

    public $filterable_fields = [
        'alignment' => 'code',
        'size' => 'name',
    ];

    public function applyAction(Action $action) {
        dd($action);
    }

    /**
     *
     * Belongs To Relations
     *
     */

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    public function alignment()
    {
        return $this->belongsTo(Alignment::class);
    }

    public function hit_point_dice()
    {
        return $this->belongsTo(Dice::class);
    }

    /**
     *
     * Belongs To Many Relations
     *
     */

    public function languages()
    {
        return $this->belongsToMany(
            Language::class,
            'character_languages',
            'character_id'
        );
    }

    public function senses()
    {
        return $this->belongsToMany(
            Sense::class,
            'character_senses',
            'character_id'
        )->withPivot('distance');
    }

    public function environments()
    {
        return $this->belongsToMany(
            Environment::class,
            'character_environments',
            'character_id'
        );
    }

    /**
     *
     * Has Many Relations
     *
     */

    public function abilities()
    {
        return $this
            ->hasMany(
                CharacterAbility::class,
                'character_id'
            )
            ->with('ability');
    }

    public function skills()
    {
        return $this->hasMany(
            CharacterSkill::class,
            'character_id'
        )->with('skill');
    }

    public function actions()
    {
        return $this->morphMany(
            Action::class,
            'object'
        );
    }

    /**
     *
     * Relation Setters
     *
     */

    public function setSizeAttribute($size) {
        if ($size) {
            $this->size()->associate(
                $size instanceof Size ?
                    $size :
                    Size::findByCodeOrFail($size)
            );
        }
    }

    public function setRaceAttribute($race) {
        if ($race) {
            $this->race()->associate(
                $race instanceof Race ?
                    $race :
                    Race::findByCodeOrFail($race)
            );
        }
    }

    public function setAlignmentAttribute($alignment) {
        if ($alignment) {
            $this->alignment()->associate(
                $alignment instanceof Alignment ?
                    $alignment :
                    Alignment::findByCodeOrFail($alignment)
            );
        }
    }

    public function setHitPointDiceAttribute($dice) {
        if ($dice) {
            $this->hit_point_dice()->associate(
                $dice instanceof Dice ?
                    $dice :
                    Dice::where('sides', $dice)->firstOrFail()
            );
        }
    }

    public function setLanguagesAttribute(array $languages = []) {
        $this->languages()->attach(
            Language
                ::whereIn('code', $languages)
                ->pluck('id')
        );
    }

    public function setItemsAttribute(array $items = [])
    {
        $this->items()->attach(
            Item
                ::whereIn(
                    'code',
                    Arr::isAssoc($items) ?
                        Arr::keys($items) :
                        $items
                )
                ->pluck('id', 'code')
                ->mapWithKeys(
                    function ($item_id, $item_code) use ($items) {
                        return [
                            $item_id => Arr::merge(
                                [
                                    'equipped' => false,
                                    'quantity' => 1,
                                    'name'     => null,
                                ],
                                $items[$item_code]
                            ),
                        ];
                    }
                )
        );
    }

    public function setSensesAttribute(array $senses = []) {
        $this->senses()->attach(
            Sense
                ::whereIn(
                    'code',
                    Arr::keys($senses)
                )
                ->pluck('id', 'code')
                ->mapWithKeys(
                    function ($sense_id, $sense_code) use ($senses) {
                        return [
                            $sense_id => [
                                'distance' => $senses[$sense_code]
                            ],
                        ];
                    }
                )
        );
    }

    public function setEnvironmentsAttribute(array $environments = []) {
        $this->environments()->attach(
            Environment
                ::whereIn('code', $environments)
                ->pluck('id')
        );
    }

    public function setAbilitiesAttribute(array $ability_codes = [])
    {
        $character_abilities = [];

        foreach ($ability_codes as $code => $score) {
            $character_abilities[] = new CharacterAbility([
                'ability' => $code,
                'score' => $score,
            ]);
        }

        $this->abilities()->saveMany($character_abilities);
    }

    public function setSkillsAttribute(array $skill_codes = [])
    {
        $character_skills = [];

        foreach ($skill_codes as $code => $bonus) {
            $character_skills[] = new CharacterSkill([
                'skill' => $code,
                'bonus' => $bonus,
            ]);
        }

        $this->skills()->saveMany($character_skills);
    }

    public function setActionsAttribute(array $actions = []) {
        $this->actions()
            ->saveMany(Arr::map(
                $actions,
                function ($action) {
                    return new Action($action);
                }
            ));
    }

    /**
     *
     * Getters
     *
     */

    public function getAbilitiesAttribute()
    {
        return $this
            ->abilities()
            ->get()
            ->keyBy('code');
    }

    public function getAverageHitPointsAttribute()
    {
        $min = $this->hit_point_dice_count;
        $max = $this->hit_point_dice_count * $this->hit_point_dice->sides;
        return $this->base_hit_points + (int) floor($min + (($max - $min) / 2));
    }

    public function getArmorClassAttribute()
    {
        $armor_class = 10;

        return $this->armor
            ->pluck('modifiers')
            ->collapse()
            ->where('type', 'stat')
            ->where('code', 'armor_class')
            ->reduce(
                function ($carry, $modifier) {
                    return $modifier->apply_bonus(
                        $carry,
                        $this
                    );
                },
                $armor_class
            );
    }

    public function getArmorAttribute()
    {
        return $this->items()
            ->whereHas('type', function ($type) {
                $type->where('code', 'armor');
            })
            ->where('character_items.equipped', true)
            ->whereDoesntHave('subtype', function ($subtype) {
                $subtype->where('code', 'shield');
            })
            ->get();
    }

    public function getShieldAttribute()
    {
        return $this->items()
            ->whereHas('type', function ($type) {
                $type->where('code', 'armor')
                    ->where('equipped', true);
            })
            ->whereHas('subtype', function ($subtype) {
                $subtype->where('code', 'shield');
            })
            ->get();
    }

    public function getWeaponsAttribute()
    {
        return $this->items()
            ->with(['actions'])
            ->whereHas('type', function ($type) {
                $type->where('code', 'weapon');
            })
            ->where('character_items.equipped', true)
            ->get();
    }

    public function getProficiencyBonusAttribute()
    {
        /**
         * proficiency bonus starts at 2 and goes up by 1 at level 5 and every
         * 4 levels thereafter. The formula for proficiency bonus is therefore:
         *
         * 1 + lvl / 4 rounded up
         */
        return ceil(1 + ($this->challenge->level / 4));
    }

    public function getAllActionsAttribute()
    {
        return $this
            ->actions()
            ->get()
            ->concat(
                $this
                    ->items
                    ->pluck('actions')
                    ->collapse()
            );
    }

    /**
     *
     * Static Methods
     *
     */

    /**
     * Creates a new character using another character as a template
     *
     * @param Character $template   Template character to use
     * @param array     $properties Character properties to override
     *
     * @return Character
     */
    public static function fromTemplate(
        Character $template,
        array     $properties = []
    ) {
        $character_class = get_class($template);

        $character = new $character_class(
            Arr::merge(
                $template->only([
                    'name',
                    'speed',
                    'size',
                    'race',
                    'alignment',
                    'challenge',
                    'base_hit_points',
                    'hit_point_dice',
                    'hit_point_dice_count',
                ]),
                [
                    'is_template' => false,
                ],
                $properties
            )
        );

        $character->save();

        $character->abilities = $template
            ->abilities
            ->mapWithKeys(function ($character_ability) {
                return [
                    $character_ability->ability->code => $character_ability->score,
                ];
            })
            ->toArray();

        $character->skills = $template
            ->skills
            ->mapWithKeys(function ($character_skill) {
                return [
                    $character_skill->skill->code => $character_skill->bonus,
                ];
            })
            ->toArray();

        $character->items = $template
            ->items
            ->mapWithKeys(function ($item) {
                return [
                    $item->code => $item->pivot->only([
                        'name',
                        'equipped',
                        'quantity',
                    ])
                ];
            })
            ->toArray();

        $character->languages = $template
            ->languages
            ->pluck('code')
            ->toArray();

        $character->senses = $template
            ->senses
            ->mapWithKeys(function ($sense) {
                return [
                    $sense->code => $sense->pivot->distance
                ];
            })
            ->toArray();

        $character->environments = $template
            ->environments
            ->pluck('code')
            ->toArray();

        $character->actions = $template
            ->actions
            ->map(
                function ($action) {
                    return $action->only([
                        'name',
                        'type',
                        'dice_count',
                        'dice',
                        'bonus',
                        'hit_bonus',
                    ]);
                }
            )
            ->toArray();

        return $character->fresh();
    }

    /**
     *
     * Methods
     *
     */
    public function rollHitPoints()
    {
        return $this->base_hit_points + $this->hit_point_dice->roll($this->hit_point_dice_count);
    }
}
