@extends('admin.layouts.master')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">مرحبًا!</h2>
                    </div>
                    <div class="col-auto">
                        <form class="form-inline">

                            <div class="form-group">
                                <button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                                <button type="button" class="btn btn-sm mr-2"><span class="fe fe-filter fe-16 text-muted"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mb-2 align-items-center">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row mt-1 align-items-center">
                                <div class="col-12 col-lg-4 text-left pl-4">
                                    <p class="mb-1 small text-muted">الرصيد</p>
                                    <span class="h3">$12,600</span>
                                    <span class="small text-muted">+20%</span>
                                    <span class="fe fe-arrow-up text-success fe-12"></span>
                                    <p class="text-muted mt-2">أتيام التريس نيسي فيل أوغيه. كورابيتور ألامكوربير نيسي. نام إيجيت دوي</p>
                                </div>
                                <div class="col-6 col-lg-2 text-center py-4">
                                    <p class="mb-1 small text-muted">اليوم</p>
                                    <span class="h3">$2600</span><br />
                                    <span class="small text-muted">+20%</span>
                                    <span class="fe fe-arrow-up text-success fe-12"></span>
                                </div>
                                <div class="col-6 col-lg-2 text-center py-4 mb-2">
                                    <p class="mb-1 small text-muted">قيمة الهدف</p>
                                    <span class="h3">$260</span><br />
                                    <span class="small text-muted">+6%</span>
                                    <span class="fe fe-arrow-up text-success fe-12"></span>
                                </div>
                                <div class="col-6 col-lg-2 text-center py-4">
                                    <p class="mb-1 small text-muted">الانتهاء</p>
                                    <span class="h3">26</span><br />
                                    <span class="small text-muted">+20%</span>
                                    <span class="fe fe-arrow-up text-success fe-12"></span>
                                </div>
                                <div class="col-6 col-lg-2 text-center py-4">
                                    <p class="mb-1 small text-muted">التحويل</p>
                                    <span class="h3">6%</span><br />
                                    <span class="small text-muted">-2%</span>
                                    <span class="fe fe-arrow-down text-danger fe-12"></span>
                                </div>
                            </div>
                            <div class="chartbox mr-4">
                                <div id="areaChart"></div>
                            </div>
                        </div> <!-- .card-body -->
                    </div> <!-- .card -->
                </div>
                <div class="row items-align-baseline">
                    <div class="col-md-12 col-lg-4">
                        <div class="card shadow eq-card mb-4">
                            <div class="card-body mb-n3">
                                <div class="row items-align-baseline h-100">
                                    <div class="col-md-6 my-3">
                                        <p class="mb-0"><strong class="mb-0 text-uppercase text-muted">الأرباح</strong></p>
                                        <h3>$2,562</h3>
                                        <p class="text-muted">لوريم إيبسوم دولور سيت أميت، كونسيكتيتور أديبيسينج إليت.</p>
                                    </div>
                                    <div class="col-md-6 my-4 text-center">
                                        <div lass="chart-box mx-4">
                                            <div id="radialbarWidget"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border-top py-3">
                                        <p class="mb-1"><strong class="text-muted">التكلفة</strong></p>
                                        <h4 class="mb-0">108</h4>
                                        <p class="small text-muted mb-0"><span>37.7% الأسبوع الماضي</span></p>
                                    </div> <!-- .col -->
                                    <div class="col-md-6 border-top py-3">
                                        <p class="mb-1"><strong class="text-muted">الإيرادات</strong></p>
                                        <h4 class="mb-0">1168</h4>
                                        <p class="small text-muted mb-0"><span>-18.9% الأسبوع الماضي</span></p>
                                    </div> <!-- .col -->
                                </div>
                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div> <!-- .col -->
                    <div class="col-md-12 col-lg-4">
                        <div class="card shadow eq-card mb-4">
                            <div class="card-body">
                                <div class="chart-widget mb-2">
                                    <div id="radialbar"></div>
                                </div>
                                <div class="row items-align-center">
                                    <div class="col-4 text-center">
                                        <p class="text-muted mb-1">التكلفة</p>
                                        <h6 class="mb-1">$1,823</h6>
                                        <p class="text-muted mb-0">+12%</p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <p class="text-muted mb-1">الإيرادات</p>
                                        <h6 class="mb-1">$6,422</h6>
                                        <p class="text-muted mb-0">-5%</p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <p class="text-muted mb-1">الأرباح</p>
                                        <h6 class="mb-1">$4,719</h6>
                                        <p class="text-muted mb-0">+22%</p>
                                    </div>
                                </div>
                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div> <!-- .col -->
                    <div class="col-md-12 col-lg-4">
                        <div class="card shadow eq-card mb-4">
                            <div class="card-body">
                                <h4 class="mb-1">توجيهات أسبوعية</h4>
                                <p class="text-muted">لوريم إيبسوم دولور سيت أميت، كونسيكتيتور أديبيسينج إليت.</p>
                                <div class="d-flex mb-1">
                                    <h1 class="h2">6,542</h1>
                                    <p class="mb-0 align-self-center text-success"><i class="fe fe-arrow-up fe-12 text-success"></i></p>
                                </div>
                                <span class="small text-uppercase text-muted">أسبوع الماضي</span>
                                <div id="lineChart1"></div>
                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div> <!-- .col -->
                </div> <!-- .row -->
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card shadow eq-card mb-4">
                            <div class="card-header eq-card-header">
                                <h6 class="mb-0">توجيهات الأداء</h6>
                            </div>
                            <div class="card-body">
                                <div class="row items-align-center">
                                    <div class="col-6">
                                        <div id="performance-chart1"></div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <div id="performance-chart2"></div>
                                    </div>
                                </div>
                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div> <!-- .col -->
                    <div class="col-12 col-lg-6">
                        <div class="card shadow eq-card mb-4">
                            <div class="card-header eq-card-header">
                                <h6 class="mb-0">توجيهات العملاء</h6>
                            </div>
                            <div class="card-body">
                                <div class="row items-align-center">
                                    <div class="col-6">
                                        <div id="customer-chart1"></div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <div id="customer-chart2"></div>
                                    </div>
                                </div>
                            </div> <!-- .card-body -->
                        </div> <!-- .card -->
                    </div> <!-- .col -->
                </div> <!-- .row -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row justify-content-between align-items-center">
                            <div class="col">
                                <h4 class="mb-1">الطلبات الأخيرة</h4>
                                <p class="small text-muted mb-0">لوريم إيبسوم دولور سيت أميت.</p>
                            </div>
                            <div class="col-auto">
                                <a href="#">العرض الكامل <i class="fe fe-arrow-right fe-16 text-primary"></i></a>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table table-bordered table-hover mb-0 text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>المنتج</th>
                                        <th>الزبون</th>
                                        <th>التاريخ</th>
                                        <th>الكمية</th>
                                        <th>السعر</th>
                                        <th>الحالة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>مثال 1</td>
                                        <td>زبون 1</td>
                                        <td>12/01/2023</td>
                                        <td>5</td>
                                        <td>$250</td>
                                        <td><span class="badge badge-warning">معلق</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>مثال 2</td>
                                        <td>زبون 2</td>
                                        <td>11/30/2023</td>
                                        <td>3</td>
                                        <td>$150</td>
                                        <td><span class="badge badge-success">منجز</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>مثال 3</td>
                                        <td>زبون 3</td>
                                        <td>11/29/2023</td>
                                        <td>8</td>
                                        <td>$400</td>
                                        <td><span class="badge badge-danger">ملغى</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>مثال 4</td>
                                        <td>زبون 4</td>
                                        <td>11/28/2023</td>
                                        <td>2</td>
                                        <td>$100</td>
                                        <td><span class="badge badge-success">منجز</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>مثال 5</td>
                                        <td>زبون 5</td>
                                        <td>11/27/2023</td>
                                        <td>6</td>
                                        <td>$300</td>
                                        <td><span class="badge badge-warning">معلق</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div> <!-- .col -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main>

@endsection

