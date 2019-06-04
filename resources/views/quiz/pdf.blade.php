<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Result PDF</title>
    <style>

            table {
                 border: solid 1px #cacbd8;
                 border-collapse: collapse;
                 border-spacing: 0;
                 color:#666666;
                 font-weight:normal;
                 line-height:20px;
                 text-align:left;
            }
             th {
                font-weight : bold;
                border: solid 1px #cacbd8;
              }
            td {
                 border: solid 1px #cacbd8;
                 padding:20px;
            }
        </style>
</head>
<body>
    <p>Results:</p>
    <table cellpadding="10">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Questions</th>
                <th>Duration</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td> {{ $loop->iteration }}</td>
                <td> {{ ucwords($user->name) }}</td>
                <td> {{ $user->email }}</td>
                <td> {{ $user->phone }}</td>
                <td> {{ $user->answers->count() }}</td>
                <td>
                  @isset($user->userTest->duration)
                   {{ $user->userTest->duration }}
                 @endisset
               </td>
                <td> {{ $user->score }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
