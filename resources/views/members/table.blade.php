<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

    <style>

        body{
            padding: 2rem;
        }

        .dt-buttons {
            margin-bottom: 2rem;
        }
        
    </style>


</head>
<body>

<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>name</th>
			<th>email</th>
			<th>skills</th>
			<th>role</th>
			<th>full name</th>
			<th>phone number</th>
			<th>gender</th>
			<th>birth day</th>
			<th>socials</th>
			<th>description</th>
			<th>speciality</th>
			<th>date Join</th>
		</tr>
	</thead>
	<tbody>
    @foreach (\App\Models\User::all() as $mmbr)
        @if(Auth()->user()->id != $mmbr->id)
            <?php
                $profile = $mmbr->profile()->first();
            ?>
            <tr>
                <td>{{ $mmbr->name }}</td>
                <td>{{ $mmbr->email }}</td>
                <td>
                    @foreach ($mmbr->skills()->get() as $skill)
                        {{ $skill->name }}
                    @endforeach
                </td>
                <td>{{ $mmbr->role()->first()->name }}</td>

                <td>
                    @if (isset($profile->full_name))
                        {{ $profile->full_name }}
                    @else
                        NULL
                    @endif
                </td>
                <td>
                    @if (isset($profile->phone_number))
                        {{ $profile->phone_number }}
                    @else
                        NULL
                    @endif
                </td>
                <td>
                    @if (isset($profile->gender))
                        {{ $profile->gender }}
                    @else
                        NULL
                    @endif
                </td>
                <td>
                    @if (isset($profile->birth_day))
                        {{ $profile->birth_day }}
                    @else
                        NULL
                        
                    @endif
                </td>
                <td>
                    @if (isset($profile->socials))
                        {{ $profile->socials }}
                    @else
                        NULL
                        
                    @endif
                </td>
                <td>
                    @if (isset($profile->description))
                        {{ $profile->description }}
                    @else
                        NULL
                    @endif
                </td>
                <td>
                    {{$profile->speciality()->first() != NULL ? $profile->speciality()->first()->name : ''}}
                </td>

                <td >
                    @if (isset($mmbr->created_at))
                        {!! date('d/M/y', strtotime($mmbr->created_at)) !!}
                    @else
                        NULL
                    @endif
                </td>
            </tr>
        @endif
    @endforeach
		
	</tbody>
</table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script>
        $(document).ready(function() {
        //Only needed for the filename of export files.
        //Normally set in the title tag of your page.
        document.title='Simple DataTable';
        // DataTable initialisation
        $('#example').DataTable(
            {
                "dom": '<"dt-buttons"Bf><"clear">lirtp',
                "paging": true,
                "autoWidth": true,
                "buttons": [
                    'colvis',
                    'copyHtml5',
            'csvHtml5',
                    'excelHtml5',
            'pdfHtml5',
                    'print'
                ]
            }
        );
    });
    </script>
</body>
</html>