<h3>Набор данных</h3>
Таблица scheduled_drives
<pre>
_________________________________________________________________________________________________________________
id |	start_datetime	    |   end_datetime	        | user_id |	car_id |	created_at      	  | updated_at
-----------------------------------------------------------------------------------------------------------------
8  |	2023-06-05 15:00:00	|    2023-06-05 18:00:01    |   1	  |  1	   |    2023-06-05 12:55:38	  |
9  |    2023-06-05 18:40:00	|    2023-06-05 19:00:01	|   1	  |  1	   |    2023-06-05 12:55:39	  |

<h2>Результаты запросов</h2>

</pre>
<p>
GET  api/cars/{userId}/{start}/{end}/{carId?}/{categoryId?}<br>
http://127.0.0.1:8002/api/cars/2/2023-06-05%2013:00/2023-06-05%2016:00
</p>
<p>
Ответ:<br>
<pre>
{
    "success": true,
    "message": "",
    "data": []
}
</pre>
</p>

<p>
GET  api/cars/{userId}/{start}/{end}/{carId?}/{categoryId?} <br>
http://127.0.0.1:8002/api/cars/2/2023-06-05%2018:10/2023-06-05%2019:00
</p>
<p>
Ответ:<br>
<pre>
{
    "success": true,
    "message": "",
    "data": []
}
</pre>
</p>

<p>
GET  api/cars/{userId}/{start}/{end}/{carId?}/{categoryId?} <br>
http://127.0.0.1:8002/api/cars/2/2023-06-05%2013:00/2023-06-05%2014:00
</p>
<p>
Ответ:<br>
<pre>
{
    "success": true,
    "message": "",
    "data": [
        {
            "id": 1,
            "model": "BMW 535",
            "car_category_id": 1
        }
    ]
}
</pre>
</p>
