@extends('admin.admin_layouts')

@section('admin_content')

<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> 
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">ورود</h5>
            <form action="{{ route('admin.login') }}" method="post">
            @csrf
              <div class="form-floating mb-3">
                  <input style="
  font-size: 16px;
  color: #4b2354;
  line-height: 1.2;
  direction: rtl;
  display: flex;
  width: 100%;
  height: 62px;
  background: transparent;
  padding: 0 20px 0 23px;border-radius: 20px;" type="email" class="form-control @error('email') is-invalid @enderror" id="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="Email">
                  <!-- <label for="floatingInput">ایمیل</label> -->
                @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-floating mb-3">
                <input style="
  font-size: 16px;
  color: #4b2354;
  line-height: 1.2;
  direction: rtl;
  display: flex;
  width: 100%;
  height: 62px;
  background: transparent;
  padding: 0 20px 0 23px;border-radius: 20px;" type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" placeholder="Password">
                <!-- <label for="floatingPassword">پسورد</label> -->
                @error('password')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                @enderror
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                <label class="form-check-label" for="rememberPasswordCheck">
                  به خاطر سپردن
                </label>
              </div>
              <div class="d-grid">
                <button style="font-size: 1.3rem;border-radius: 10px;width: 100%;letter-spacing: 0.05rem;padding: 0.75rem 1rem;" class="btn btn-primary text-uppercase fw-bold" type="submit">ورود</button>
              </div>
              <br>
              <div class="d-grid">
               <a href=""> <button style="font-size: 1.3rem;border-radius: 10px;width: 100%;letter-spacing: 0.05rem;padding: 0.75rem 1rem;color:#2db4e9" class="btn  text-uppercase fw-bold" type="submit">ایجاد حساب جدید</button></a>
              </div>
              <hr class="my-4">
              <!-- <div class="d-grid mb-2">
                <button style="font-size: 0.9rem;letter-spacing: 0.05rem;padding: 0.75rem 1rem; color: white; background-color: #ea4335;" class="btn btn-google text-uppercase fw-bold" type="submit">
                  <i class="fab fa-google me-2"></i> با حساب گوگل وارد شوید
                </button>
              </div> -->
            
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
@endsection