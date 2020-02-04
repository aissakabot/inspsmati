@extends('admin.layouts.main')
@section('content')
<div class="container">
<div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">إحصائيات الموقع</h3>
              </div>
              <div class="panel-body">
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2>
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{cptusers()}}</h2>
                    <h4>
                    مستخدمين</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> {{cptactivites()}}</h2>
                    <h4>إنجازات</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{cptrealisations()}}</h2>
                    <h4>نشاطات</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 12,334</h2>
                    <h4>زيارات</h4>
                  </div>
                </div>
              </div>
              </div>

              <!-- Latest Users -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">آخر المستخدمين انضماما</h3>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                      <tr>
                        <th>الإسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>تاريخ الانضمام</th>
                      </tr>
     
                      @forelse(App\User::orderBy('created_at','Desc')->get()->take(10) as $user)
                      <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                      </tr>
                      @empty
                      <h3>  لا يوجد مستخدمون حاليا</h3>
                      @endforelse
                    </table>
                </div>
              </div>
</div>
@endsection