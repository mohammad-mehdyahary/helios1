@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5> جستجو گزارش </h5>
         
        </div><!-- sl-page-title -->


        <div class="row">
            <div class="col-lg-4">
             <div class="card pd-20 pd-sm-40">
               <div class="table-wrapper">
         
              <form method="post" action="{{ route('search.by.date') }}" > @csrf
               <div class="modal-body pd-20">
                 <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">جستجو زمان</label>
                  <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="date">
                 </div>
                 
                  
                        </div><!-- modal-body -->
                      <div class="modal-footer">
                 <button type="submit" class="btn btn-info pd-x-20">جستجو</button>
               </div>
              </form>
            </div>
          </div><!-- modal-dialog -->
            </div>

            <div class="col-lg-4">
             <div class="card pd-20 pd-sm-40">
               <div class="table-wrapper">
         
              <form method="post" action="{{ route('search.by.month') }}" > @csrf
               <div class="modal-body pd-20">
                 <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">جستجو ماه</label>
                  <select name="month" id="" class="form-control">
                    <option value="farvardin">فروردین</option>
                    <option value="ordibhsht">اردیبهشت</option>
                    <option value="khordad">خرداد</option>
                    <option value="tir">تیر</option>
                    <option value="mordad">مرداد</option>
                    <option value="shahrivar">شهریور</option>
                    <option value="mehr">مهر</option>
                    <option value="aban">آبان</option>
                    <option value="azar">آذر</option>
                    <option value="dai">دی</option>
                    <option value="bahman">بهمن</option>
                    <option value="asfand">اسفند</option>
                  </select>
                 </div>
                 
                  
                        </div><!-- modal-body -->
                      <div class="modal-footer">
                 <button type="submit" class="btn btn-info pd-x-20">جستجو</button>
               </div>
              </form>
            </div>
          </div><!-- modal-dialog -->
            </div>

            <div class="col-lg-4">
             <div class="card pd-20 pd-sm-40">
               <div class="table-wrapper">
         
              <form method="post" action="{{ route('search.by.year') }}" > @csrf
               <div class="modal-body pd-20">
                 <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">جستجو سال </label>
                 <select name="year" id="" class="form-control">

                    <option value="1398">۱۳۹۸</option>
                    <option value="1399">۱۳۹۹</option>
                    <option value="1400">۱۴۰۰</option>
                    <option value="1401">۱۴۰۱</option>
                    <option value="1402">۱۴۰۲</option>
                    <option value="1403">۱۴۰۳</option>
                    <option value="1404">۱۴۰۴</option>
                    <option value="1405">۱۴۰۵</option>
                      
                  </select>
                 </div>
                 
                  
                        </div><!-- modal-body -->
                      <div class="modal-footer">
                 <button type="submit" class="btn btn-info pd-x-20">جستجو</button>
               </div>
              </form>
            </div>
          </div><!-- modal-dialog -->
            </div>

        </div>

        
        </div><!-- modal -->
@endsection