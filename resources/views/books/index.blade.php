<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Livros</title>
  <!-- Fonts -->
  <link rel="stylesheet" href="{{ url('css/css2.css') }}">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <style>
    .checkbox {
      display: inline-block !important;
    }

    tfoot input {
      width: 100%;
      padding: 3px;
      box-sizing: border-box;

    }

    .btn-outline-info {
      color: #007bff;
      background-color: transparent;
      background-image: none;
      border-color: #007bff !important;

    }

    /*   .btn:hover {
          background-color: #007bff !important;
          transform: rotate(180deg);
           transition: 150ms;
    }
*/

    /*  .btn-outline-info:not(:disabled):not(.disabled):active,
      .btn-outline-info:not(:disabled):not(.disabled).active,
      .show>.btn-outline-info.dropdown-toggle
       {
          background-color: #007bff !important;
      }
      */

    .dropdown-item:hover {
      /* background-color: #007bff !important; */
      /* background-color: #818cf8 !important; */

    }

    svg {
      display: inline-block !important;
    }

    .btDropdown {
      padding: 4px !important;
      margin-top: -4px !important;
    }

    table.table-bordered.dataTable tbody th,
    table.table-bordered.dataTable tbody td {
      padding: 6px !important
    }

  </style>

  <link rel="stylesheet" href='{{ url('datatablesCss/bootstrap.min.css') }}'>
  <link rel="stylesheet" href='{{ url('datatablesCss/bootstrap.css') }}'>
  <link rel="stylesheet" href='{{ url('datatablesCss/dataTables.bootstrap4.min.css') }}'>
  <link rel="stylesheet" href='{{ url('datatablesCss/responsive.bootstrap4.min.css') }}'>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- jQuery -->
  <script src='{{ url('js/jquery-3.5.1.js') }}' type="text/javascript"></script>

  {{-- DataTable Js --}}
  <script src='{{ url('dataTablesJs/jquery.dataTables.min.js') }}' type="text/javascript"></script>
  <script src='{{ url('dataTablesJs/dataTables.bootstrap4.min.js') }}' type="text/javascript"></script>
  <script src='{{ url('dataTablesJs/dataTables.responsive.min.js') }}' type="text/javascript"></script>
  <script src='{{ url('dataTablesJs/responsive.bootstrap4.min.js') }}' type="text/javascript"></script>

  <script src="{{ url('js/alunos/index.js') }}"></script>

  <script src="{{ url('bootstrap-4/js/popper.min.js') }}"></script>
  <script src="{{ url('bootstrap-4/js/bootstrap.min.js') }}"></script>


  <script>
    $(document).ready(function() {
      // Setup - add a text input to each footer cell
      $('#example tfoot th').each(function() {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="' + title + '" />');
      });
      var table = $('#example').DataTable({

        "columnDefs": [{
          "targets": [0, 1],
          "orderable": false
        }],
        "lengthMenu": [
          [7, 10, 15, 20, 25, 30, 35, 40, 50, 70, 100, -1],
          [7, 10, 15, 20, 25, 30, 35, 40, 50, 70, 100, "All"]
        ],
        "language": {
          "lengthMenu": " _MENU_ <button type= 'subimit' class='btn btn-outline-info' disabled id = 'btEditBloc' title = 'Marque ao menos uma caixinha'>Editar em Bloco</button>",
          "zeroRecords": "Nenhum aluno encontrado",
          "info": "Mostrando pagina _PAGE_ de _PAGES_",
          "infoEmpty": "Sem registros",
          "search": "Busca:",
          "infoFiltered": "(filtrado de _MAX_ total de alunos)",
          "paginate": {
            "first": "Primeira",
            "last": "Ultima",
            "next": "Proxima",
            "previous": "Anterior"
          },
        },
      });
      // Apply the search
      table.columns().every(function() {
        var that = this;
        $('input', this.footer()).on('keyup change', function() {
          if (that.search() !== this.value) {
            that
              .search(this.value)
              .draw();
          }
        });
      });
    });
  </script>

</head>

<body>
  @include('layouts.navigation')

  @include('includes.alerts')


  <div class="container-fluid" style="margin-top: 12px">
    <form action="{{ route('turmas.aluno.edit.bloco') }}" method="POST" class="form" name="form">
      @csrf     

      <div class="row" >
        <div class="col-sm-4">
          <a href="{{ route('books.create') }}" class="btn btn-outline-success btn-block"><b>Adicionar Livros</b></a>&nbsp;
        </div>
        <div class="col-sm-4">
          <!--<a href="" target="_self"><button type="submit" value="" class="btn btn-warning btn-block botoes"><span class='glyphicon glyphicon-print text-success' aria-hidden='true' style="margin-right: 12px;color: white"></span>Capa da Transferência</button></a>-->
          <button type="submit" style="margin-bottom: 12px" name="botao" value="folha_rosto" class="btn btn-outline-warning btn-block btvalida" disabled="">
            <span class='glyphicon glyphicon-print text-success' aria-hidden='true' style="margin-right: 12px;color: white"></span>
            <b>Capa da Transferência</b>
          </button>
        </div>
        <div class="col-sm-4">
          <button type="submit" style="margin-bottom: 12px" name="botao" value="folha_notas" class="btn btn-outline-primary btn-block btvalida" disabled=""><span
              class='glyphicon glyphicon-print text-success' aria-hidden='true' style="margin-right: 12px;color: white"></span>Notas para a
            Transferência</button>
        </div>
      </div>

      <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%;">
        <thead>
          <tr>
            <th style="width: 40px !important">
              <span><input type='checkbox' id="selecionar"></span>
            </th>
            <th class="whitespace-normal sm:whitespace-nowrap md:whitespace-nowrap">TITULO</th>
            <th>ESCRITOR</th>
            <th>EDITORA</th>
            <th>ANO_LANCAMENTO</th>
            <th>ETAPA</th>
            <th>TURMA</th>
            <th>QUANTIDADE</th>
            <th>IDENTIFICADOR</th>

        </thead>
        <tbody>
          @foreach ($books as $book)
            <tr>
              <td></td>
              <td>{{ $book->TITULO }}</td>
              <td>{{ $book->ESCRITOR }}</td>
              <td>{{ $book->EDITORA }}</td>
              <td>{{ $book->ANO_LANCAMENTO }}</td>
              <td>{{ $book->ETAPA }}</td>
              <td>{{ $book->TURMA }}</td>
              <td>{{ $book->QUANTIDADE }}</td>
              <td>{{ $book->IDENTIFICADOR }}</td>
            </tr>
          @endforeach

        </tbody>
        <tfoot>
          <tr>
            <th style=" width: 60px !important"></th>
            <th>{{ $book->TITULO }}</th>
            <th>{{ $book->ESCRITOR }}</th>
            <th>{{ $book->EDITORA }}</th>
            <th>{{ $book->ANO_LANCAMENTO }}</th>
            <th>{{ $book->ETAPA }}</th>
            <th>{{ $book->TURMA }}</th>
            <th>{{ $book->QUANTIDADE }}</th>
            <th>{{ $book->IDENTIFICADOR }}</th>
        </tfoot>
      </table>

    </form>

  </div>



</body>

</html>
