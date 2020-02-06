# OpenDM Server

# Initialisation

Create a database named 'opendm'

````
php artisan migrate
php artisan serve
````

Then run this SQL to create your first monster

````SQL
INSERT INTO `monsters` (`id`, `name`, `size_id`, `base_hp`, `hp_die_id`, `hp_die_count`, `armor_id`, `speed`, `strength`, `dexterity`, `constitution`, `intelligence`, `wisdom`, `charisma`, `challenge_id`, `created_at`, `updated_at`) VALUES (NULL, 'Orc', '3', '6', '3', '2', '4', '30', '16', '12', '16', '7', '11', '10', '4', NULL, NULL)
````

Go to http://127.0.0.1:8000/api/monster/retrieve/1/ for a json response


## Installing dev toolkit
- Copy and rename `toolkit.env.example.sh` to `toolkit.env.sh`
- Fill in `toolkit.env.sh` fields
- Add following to `.bashrc` or equivilent
```
. ~/<path-to-docker-repo>/toolkit.env.sh
. ~/<path-to-docker-repo>/toolkit.sh
```
