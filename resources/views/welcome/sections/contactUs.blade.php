<section class="py-5" id="contactUs">
    <div class="container">
        <h3 class="text-center text-dark mb-5">Get In Touch</h3>
        <div class="row mt-4">
            <div class="col-md-6">
              <h5 class="text-primary-dark">  We would love to talk to  you</h5> 
              <p class="mt-4">
                  Ping us  if you would love to support or be part of any <br>
                  projects  we are working on in the communities
              </p>
              <ul class="list-unstyled mt-4">
                <li>
                    <svg><use xlink:href="#icon-call"></use></svg>
                    +256773451635
                </li>
                <li>  
                    <svg><use xlink:href="#icon-inbox"></use></svg>
                    admin@communitypulseug.com
                </li>
            </ul>

        </div>
        <div class="col-md-6 mx-auto">
            <form action="{{ route('messages.store') }}" method="post" id="jscontactForm">
                @csrf
                <!-- name -->
                <div class="form-group">
                    <input type="text" placeholder="Your Name" class="form-control" name="name">
                </div>
                <!-- email -->
                <div class="form-group">
                    <input type="text" placeholder="Email Address" class="form-control" name="email">
                </div>
                <!-- subject -->
                <div class="form-group">
                    <input type="text" placeholder="Subject" class="form-control" name="subject">
                </div>
                <!-- message -->
                <div class="form-group">
                    <textarea  rows="2" class="form-control"  placeholder="Your Message" name="body"></textarea>
                </div>

                <div id="jsContactMessage"></div>

                <div class="form-group">
                    <button class="btn btn-dark" id="jsContactButton">Send Message</button>
                </div>

            </form>
        </div>
    </div>
</div>
</section>