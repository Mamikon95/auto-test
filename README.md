How run:
- run `php init`
- set db settings in **common/config/main.local**
- run `php yii migrate`
- run for backend `php yii serve --port 8082`
- run for frontend `php yii serve --port 8080`

in order to enter the admin panel, use the data: <br />
username: `admin` <br />
password: `qwerty`

Api information:
- GET /api/v1/parts (if params not sended(id, number, name, count ...) then will return all data), for detail view send id={id} in parameter.
- GET /api/v1/parts/basket (get full basket data for current user)
- POST /api/v1/parts/basket?partId={partId} (send part to basket)

`Auth method is Basic Auth(use user token)` <br />