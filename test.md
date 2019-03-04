#laravel 5.8
- no bootstrap
- no design

---------

#step 1

####fillable : title, description, image
- model
- controller
- migration

use https://laravel.com/docs/5.8/eloquent

use  https://laravel.com/docs/5.8/migrations

---------

#step blade
### product CRUD
create all method [index, create, store, edit, update, destroy]
- image set be null
---------

#step package
use package
### image product
use http://image.intervention.io/
to resize image

---------

#step Relationships

use https://laravel.com/docs/5.8/authentication

use https://laravel.com/docs/5.8/eloquent-relationships
## user connect product with user_id

---------

#step policy
[x] hard

use https://laravel.com/docs/5.8/authorization
- another user can't change owned products

---------

#step seeding

use https://laravel.com/docs/5.8/seeding
- create factory and seed class for 5 product
- image not important set default.jpg
```$xslt
//namespase : ProducteSeeder
factory(App\Product::class, 5)->create()
```

---------

#step relationships

use https://laravel.com/docs/5.8/eloquent-relationships

---------

#step redis
- install redis and cash data for 1 min

use https://laravel.com/docs/5.8/redis

use https://laravel.com/docs/5.8/cache


---------

#step events

use https://laravel.com/docs/5.8/events




