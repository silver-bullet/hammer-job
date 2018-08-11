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
                    <ul style="list-style: none;">
                        <li>1. <b>GET</b> /api/category</li>
                        <li>2. <b>POST</b> /api/category/filter</li>
                        <li>------------------------------</li>
                        <li>3. <b>GET</b> /api/job</li>
                        <li>4. <b>POST</b> /api/job/filter</li>
                        <li>5. <b>GET</b> /api/job/{id}</li>
                        <li>6. <b>POST</b> /api/job</li>
                        <li>7. <b>PUT</b> /api/job/{id}</li>
                        <li>------------------------------</li>
                        <li>8.<b>POST</b> /api/zip-codes/filter</li>
                    </ul>
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
                            requests to retrieve resource's relations with the resource itself.<br>
                            <i>format: with[]=relation_name</i>
                        </li>
                        <li><b>paginate</b>: used with
                            <span class="underline">FILTER</span>,
                            <span class="underline">LIST</span>
                            requests to enable/disable pagination.
                        </li>
                        <li>
                            <b>query</b>: used only with
                            <span class="underline">FILTER</span>
                            request to search the resources by its main key which is as the following:<br>
                            Job: title<br>
                            ZipCode: code<br>
                            Category: name<br>
                        </li>
                        <li>
                            <b>conditions</b>: used only with
                            <span class="underline">FILTER</span>
                            request to filter the resources based on both its direct attributes and its relations.<br>
                            <i>format: conditions[attr_name:operator_name]=value</i><br>
                            * attr_name could be nested to 2 levels at maximum<br>
                            * operator_name could be: eq, in, gt<br>
                            examples:<br>
                            <i>conditions[name:eq]=test ## attributes</i><br>
                            <i>conditions[id:in]=2,4    ## attributes</i><br>
                            <i>conditions[zipCode.id:in]=2,4      ## 1 level relation</i><br>
                            <i>conditions[zipCode.city.id:in]=2,4 ## 2 level relation</i><br>
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
            examples:<br>
            <b>POST</b> /api/job?conditions[category.id:in]=1,2,3&with[]=category&with[]=zipCode<br>
            <b>POST</b> /api/job?conditions[zipCode.id:in]=1,2,3&with[]=category&with[]=zipCode<br>
            <b>POST</b> /api/job?conditions[zipCode.city.id:in]=1,2,3&with[]=category&with[]=zipCode<br>
            <b>POST</b> /api/job?conditions[zipCode.city.name:eq]=Berlin&with[]=category&with[]=zipCode<br>
            Note that you can mix them up.

            <br><br><br>

            Note: this is just a suggested architecture. however, there are many others that the team could agree on

            <br><br><br>

        </div>





    </body>
</html>
