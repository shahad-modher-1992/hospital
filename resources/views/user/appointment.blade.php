
    <div class="page-section">
        <div class="container">
          <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

          @if ($errors->any())
          @foreach ($errors->all() as $error )
          <div class="alert alert-danger">
            <p>{{ $error }}</p>

          </div>
          @endforeach
            
          @endif
    
          <form class="main-form" method="POST" action="{{ route("appointment.store") }}">
 
            @csrf

            <div class="row mt-5 ">
              <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                <input type="text" name="name" class="form-control" placeholder="Full name">
              </div>

              <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                <input type="text" name="email" class="form-control" placeholder="Email address..">
              </div>

              <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                <input type="text" name="phone" class="form-control" placeholder="Phone number..">
              </div>

              <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                <input type="text" name="status" class="form-control" placeholder="status ..">
              </div>

              <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                <input type="date" name="date" class="form-control">
              </div>
              <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                <select  id="departement" class="custom-select" name="doctor_id">
                  <option value="" selected>Doctor Name</option>
                  @foreach ($doctors as $doctor )
                  <option value="{{ $doctor->id }}">{{ $doctor->name }}  --specialty-- ({{ $doctor->specialty->name }}) </option>
                  @endforeach
                 
                </select>
              </div>
              <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                <input type="text" name="user_id" class="form-control" value="{{ Auth::user()->id }}" >
              </div>
              <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
              </div>
            </div>
    
            <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
          </form>
        </div>
      </div>