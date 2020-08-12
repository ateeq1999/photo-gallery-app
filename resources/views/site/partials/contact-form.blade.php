<div id="contact_form" class="ml-5">
    <form id="form1" action="{{route('site.contact-us-store')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('post')}}
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="name">name *</label>
                    <input name="name" type="text" class="form-control">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="name">name *</label>
                    <input name="name" type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="form_row">
            <label for="subject">subject *</label>
            <input name="subject" type="text" class="form-control">
        </div>
        <div class="form_row">
            <label for="message">your message</label>
            <textarea name="message" rows="3" cols="20" id="ContentPlaceHolder1_txtMessage" class="form-control"></textarea>
        </div>
        <input type="submit" name="ctl00$ContentPlaceHolder1$btnSubmit" value="Submit" id="ContentPlaceHolder1_btnSubmit" class="submit_btn">
        <div id="ContentPlaceHolder1_valsumm" style="display:none;">
        </div>
    </form>
</div>