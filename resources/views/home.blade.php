<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }

        table {
            width: 50%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            padding: 8px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            padding: 8px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .add-form {
            display: none;
            width: 50%;
            margin-top: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .add-form label {
            display: block;
            margin-bottom: 8px;
        }

        .add-form button {
            background-color: #333;
        }

        .add-form button:hover {
            background-color: #555;
        }

        .show-form .add-form {
            display: block;
        }
    </style>
</head>

<body>

    <h2>Todo List</h2>

    <button onclick="showForm(event)">Create</button>

    <div class="add-form">
        <form method="POST" action="{{ route('task.store') }}">
            @csrf
            <label for="task">Task Name:</label>
            <input type="text" id="task" name="taskname" required><br>
            <label for="taskdesc">Task Description :</label>
            <input type="text" name="description" id="" required>
            <button type="submit" onclick="done()">Add Task</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>SNO</th>
                <th>Task Name</th>
                <th>description</th>
                <th>completed </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $key => $task)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$task->taskname}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->status}}</td>
                <td>
                    <form action="{{ route('tasks.complete', ['task' => $task->id]) }}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit">Completed</button>
                    </form>
                </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function showForm(event) {
            event.preventDefault();
            let form = document.querySelector('.add-form');
            form.style.display = 'block';
        }

        function done() {
            alert('Task add SuccessFully');
        }
    </script>

</body>

</html>



<a href="/logout">Logout</a>