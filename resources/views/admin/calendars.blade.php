@extends('admin.template')

@section('title')
    Calendriers
@endsection

@section('content')
    @isset($calendars)
        <script>
            var getCalendars = @json($calendars);
        </script>
    @endisset
    @include('admin.tools.calendar-modal')
    <div class="col-md-12">
        <div class="card calendars-card calendar1">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">RDV Clients</h4>
                <span data-type="clients" class="newRdv scrud_lib_importer card-category">
                    {!! import_svg('cals', 'card-calendar-icon') !!}
                    Ajouter un RDV
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive"  id="calendar1">
                    <!-- FullCalendar -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card calendars-card calendar2">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Formations</h4>
                <span data-type="formations" class="newRdv scrud_lib_importer card-category">
                    {!! import_svg('cals', 'card-calendar-icon') !!}
                    Ajouter un RDV
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive"  id="calendar2">
                    <!-- FullCalendar -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card calendars-card calendar3">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Interventions</h4>
                <span data-type="interventions" class="newRdv scrud_lib_importer card-category">
                    {!! import_svg('cals', 'card-calendar-icon') !!}
                    Ajouter un RDV
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive"  id="calendar3">
                    <!-- FullCalendar -->
                </div>
            </div>
        </div>
    </div>
@endsection
