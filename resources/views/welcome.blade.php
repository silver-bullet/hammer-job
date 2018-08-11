<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" sizes="144x144" href="https://www.my-hammer.de/apple-touch-icon-144x144-precomposed.png">

        <style>
            * {
                font-family: "DejaVu Sans Mono";
            }
            .my-hammer {
                color: red;
                font-weight: bold;
            }
            .paragraph {
                margin-bottom: 30px;
            }
            .center {
                text-align: center;
            }
            .underline {
                text-decoration: underline;
            }
            .shift {
                padding: 30px 0px 30px 150px;
            }
            .button {
                background-color: black;
                border: none;
                color: white;
                padding: 15px 25px;
                cursor: pointer;
                text-decoration: none;
            }
        </style>
        <title>MyHammer</title>
    </head>
    <body>

        <div class="paragraph center">
            Welcome to <span class="my-hammer">MyHammer</span> Jobs API Version 1.0
        </div>

        <div class="paragraph center">
            Click on the following button to access swagger-based API documentation which will help you easily test the API
            <br><br>
            <a class="button"
               href="/api/v1/docs" target="_blank">Api Docs</a>
            <br><br>
        </div>

        <div class="shift">
            <div style="width:30%; float:left">
                <div class="paragraph">
                    Based on the given requirements, I have implemented only the following endpoints:
                    <ol>
                        <li><b>GET</b> /api/category</li>
                        <li><b>POST</b> /api/category/filter</li>

                        <li><b>GET</b> /api/job</li>
                        <li><b>POST</b> /api/job/filter</li>
                        <li><b>GET</b> /api/job/{id}</li>
                        <li><b>POST</b> /api/job</li>
                        <li><b>PUT</b> /api/job/{id}</li>

                        <li><b>POST</b> /api/zip-codes/filter</li>
                    </ol>
                </div>
            </div>

            <div style="width:50%; float:left; margin-left: 100px">
                    There are basically 4 main query parameters,
                    <ul>
                        <li>
                            <b>with</b>: used with
                            <span class="underline">FILTER</span>,
                            <span class="underline">LIST</span>,
                            <span class="underline">STORE</span>,
                            <span class="underline">UPDATE</span>,
                            <span class="underline">SHOW</span>
                            requests to retrieve resource's relations with the relation itself.<br>
                            <i>format: with[]=relation_name</i>
                        </li>
                        <li><b>paginate</b>: used with
                            <span class="underline">FILTER</span>,
                            <span class="underline">LIST</span>
                            requests to enable/disable pagination.</li>
                        <li>
                            <b>conditions</b>: used with
                            <span class="underline">FILTER</span>
                            request only to filter the resource based on its attributes.<br>
                            <i>format: conditions[attr_name:operator_name]=value</i><br>
                            current supported operators: eq, in, gt<br>
                            <i>ex: conditions[name:eq]=test</i><br>
                            <i>ex: conditions[id:in]=2,4</i><br>
                        </li>
                        <li>
                            <b>query</b>: used with
                            <span class="underline">FILTER</span>
                            request only to search the resources using resource's main key which is as the following:<br>
                            Job: title<br>
                            ZipCode: code<br>
                            Category: name<br>
                        </li>
                    </ul>

                    <br><br>
                </div>
            </div>
        </div>

        <div style="clear: both"></div>

        <div class="paragraph shift">

            Based on the requirements:

            <br><br><br>

            Front-end developers will need an endpoint to retrieve the available services/categories,<br>
            so that they can list them to the customer. for this purpose:<br>
            I have implemented both #1 and #2<br>
            #1 will list all the service/categories,<br>
            <b>GET</b> /api/category<br>
            and since you mentioned that the number of categories are likely to increase in the future<br>
            #2 was implemented,<br>
            I imagine that a search box will be more practical at that time<br>
            and the filter endpoint api could be used for filtering based on what the user types.<br>
            <b>POST</b> /api/category/filter?query=WHAT_USER_TYPES

            <br><br><br>

            Next, You mentioned that once the user enters some zipcode, the city should be auto-completed.<br>
            #8 was implemented for this purspose,<br>
            it could be used to retrieve a zipcode item that matches the entered one:<br>
            <b>POST</b> /api/zip-codes/filter?conditions[code:eq]=WHAT_USER_TYPES&with[]=city

            <br><br><br>

            Next, to actually create a job, you will submit a request to the following endpoint<br>
            <b>POST</b> /api/job<br>
            To Update, you may need to retrieve the job by its ID first and then submit data back<br>
            #5 & #7 were created for these purposes respectively<br>
            Note that both create and update endpoints will return the created/updated entity<br>
            Note that You may need to retrieve job's relationships by using with parameter:<br>
            <b>POST</b> /api/job?with[]=zipCode&with[]=zipCode.city&with[]=category

            <br><br><br>

            To retrieve all the jobs up to 30 days, you will use this endpoint<br>
            <b>GET</b> /api/job<br>
            you may enable or disable pagination by sending paginate query parameter with the request.<br>
            To be able to filter based on region or category/service, you could easily use the filter endpoint<br>
            <b>POST</b> /api/job?conditions[zipcode_id:in]=1,2,3&conditions[category_id:in]=4,5,6&with[]=category&with[]=zipCode<br>


            <br><br><br>

            Note: this is just a suggested architecture. however, there are many others that the team could agree on

            <br><br><br>

        </div>





    </body>
</html>
