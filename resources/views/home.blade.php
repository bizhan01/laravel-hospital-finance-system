@if(auth()->user()->isAdmin == 1)
  @include('admin.adminDashboard')
@elseif(auth()->user()->isAdmin == 3)
  @include('pharmacy.pharmacistDashboard')
@elseif(auth()->user()->isAdmin == 4)
  @include('lab.labDashboard')
@elseif(auth()->user()->isAdmin == 5)
  @include('dental.dentalDashboard')
@else
  @include('reception.receptionistDashboard')
@endif
