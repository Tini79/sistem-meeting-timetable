@extends('layouts.main')
@section('content')
<div class="p-5 bg-white w-100" style="overflow-x: auto;">
    <div class="mb-3 mr-1 row justify-content-end">
        <form action="/dashboard" method="post">
            @csrf
            <div class="input-group-sm d-flex col-lg">
                <input type="text" name="dateFilter" class="form-control" value="" required />
                <button type="submit" class="btn btn-primary btn-sm">Cari</button>
            </div>
        </form>
    </div>
    <div class="overflow-auto">
        <table border=1 class="table-sm table-bordered w-100" id="tableAssignment">
            {!! $table !!}
        </table>
    </div>
</div>
@push('js')
<script>
    $(function() {
        $('input[name="dateFilter"]').daterangepicker({
            autoUpdateInput: false,
            autoApply: true,
            opens: 'left',
            locale: {
                format: 'DD-MM-YYYY'
            }
        });

        $('input[name="dateFilter"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
        });
        $('input[name="dateFilter"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    })
</script>
@endpush
@endsection