<?php
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <title>Class Meeting Central</title>
        <link href='./calendar/lib/main.css' rel='stylesheet' />
        <script src='./calendar/lib/main.js'></script>
        <script src='./calendar/lib/moment.js'></script>
        <script src='./calendar/lib/jquery-3.5.1.js'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    slotMinTime: '08:00',
                    slotMaxTime: '20:00',
                    slotDuration: '00:15:00',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'timeGridWeek,timeGridDay'
                    },
                    initialView: 'timeGridWeek',
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    selectable: true,
                    selectHelper: true, //RESEARCH FUNCTION
                    nowIndicator: true,
                    dayMaxEvents: true, // allow "more" link when too many events
                    events: 'load.php',
                    select: function(start, end, allDay)
                    {

                     var title = prompt("Enter Event Title");
                     if(title)
                     {
                      console.log(start);
                      console.log(end);
                      var start = moment(start).format();
                      var end = moment(end).format();
                      console.log(start);
                      console.log(end);
                      $.ajax({
                       url:"insert.php",
                       type:"POST",
                       data:{title:title, start:start, end:end},
                       success:function()
                       {
                        calendar.fullCalendar('refetchEvents');
                        alert("Added Successfully");
                      }
                    })
                      }
                    }
                });
                calendar.render();
            });

        </script>
        <style>
            body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
            }

            #calendar {
            max-width: 1100px;
            margin: 0 auto;
            }
        </style>
    </head>

    <body>
        <br>
        <div class="container">
            <div id="calendar">
            </div>
        </div>
    </body>
</html>
