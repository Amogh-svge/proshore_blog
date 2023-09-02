<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <h1>Lorem ipsum dolor sit amet.</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum est iusto magnam, sequi, error ab cumque quae
            corporis deleniti nulla laboriosam exercitationem perferendis sapiente fugiat asperiores veniam debitis nisi
            consequuntur perspiciatis minima quis ad voluptates enim! Facilis suscipit sequi architecto, aliquid cumque
            magni? Consequatur facilis vitae rem? Architecto, dolores necessitatibus?</p>





        <table border="1">
            <tr>
                <td>Title</td>
                <td>Due Date</td>
                <td>Statsu</td>
            </tr>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task['task_title'] }}</td>
                    <td>{{ $task['due_date'] }}</td>
                    <td>{{ $task['task_status'] }}</td>
                </tr>
            @endforeach

        </table>
    </div>
</body>

</html>

















{{-- <?php echo 'Hello world'; ?>

{{ 'hello world' }}





<?php $basket = 'apple';
if ($basket == 'orange'): ?>
<p style="background-color: orange"> I have an orange</p>
<?php else:?>
<p style="background-color: red">I have an apple</p>
<?php endif?>





@if ($basket == 'orange')
    <p style="background-color: orange">I have an orange</p>
@else
    <p style="background-color: red">I have an apple</p>
@endif --}}
