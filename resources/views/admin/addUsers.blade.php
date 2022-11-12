@include('adminPartial.header')
<title>Add User - Admin Dashboard</title>

<!-- Content wrapper scroll start -->
        <div class="content-wrapper-scroll">

            <!-- Content wrapper start -->
            <div class="content-wrapper">

                <!-- Row start -->
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
@include('flash-message')
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Add New User</div>
                            </div>
                            <div class="card-body">
                                <form action="{{url('storeUsers')}}" method="post">
                                    @csrf
                                <div id="example-form">
                                    <h3>General Information</h3>
                                        <h6 class="h-0 m-0">&nbsp;</h6>
                                        <div class="row gutters">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                    <div class="field-wrapper">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="First Name" name="first_name" required>
                                                        </div>
                                                        <div class="field-placeholder">First Name <span class="text-danger">*</span></div>
                                                    </div>

                                                </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                    <div class="field-wrapper">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" required>
                                                        </div>
                                                        <div class="field-placeholder">Last Name <span class="text-danger">*</span></div>
                                                    </div>

                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                    <div class="field-wrapper">
                                                        <input type="text" placeholder="Phone Number" name="phone" required>
                                                        <div class="field-placeholder">Phone Number <span class="text-danger">*</span></div>
                                                    </div>

                                                </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                            <div class="field-wrapper">
                                                <select class="form-select" id="paymentSelect" name="role">
                                                    <option value="1">User</option>
                                                    <option value="2">Admin</option>
                                                </select>
                                                <div class="field-placeholder">Role</div>
                                            </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="dashboard" value="1" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">dashboard</label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="stock" value="2" id="customCheck2">
                                                        <label class="custom-control-label" for="customCheck2">stock</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="users" value="3" id="customCheck3">
                                                        <label class="custom-control-label" for="customCheck3">users</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="sell" value="4" id="customCheck4">
                                                        <label class="custom-control-label" for="customCheck4">sell</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="expenses" value="5" id="customCheck5">
                                                        <label class="custom-control-label" for="customCheck5">expenses</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="quote" value="6" id="customCheck6">
                                                        <label class="custom-control-label" for="customCheck6">quote</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <br>
                                                <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- Row end -->

            </div>
            <!-- Content wrapper end -->

            <!-- App footer start -->
            <div class="app-footer">© Uni Pro Admin 2021</div>
            <!-- App footer end -->

        </div>
        <!-- Content wrapper scroll end -->

    </div>
    <!-- *************
        ************ Main container end *************
    ************* -->

</div>
<!-- Page wrapper end -->

<!-- *************
    ************ Required JavaScript Files *************
************* -->
<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/moment.js"></script>

<!-- *************
    ************ Vendor Js Files *************
************* -->

<!-- Megamenu JS -->
<script src="vendor/megamenu/js/megamenu.js"></script>
<script src="vendor/megamenu/js/custom.js"></script>

<!-- Slimscroll JS -->
<script src="vendor/slimscroll/slimscroll.min.js"></script>
<script src="vendor/slimscroll/custom-scrollbar.js"></script>

<!-- Search Filter JS -->
<script src="vendor/search-filter/search-filter.js"></script>
<script src="vendor/search-filter/custom-search-filter.js"></script>

<!-- Rating JS -->
<script src="vendor/rating/raty.js"></script>
<script src="vendor/rating/raty-custom.js"></script>

<!-- Steps wizard JS -->
<script src="vendor/wizard/jquery.steps.min.js"></script>
<script src="vendor/wizard/jquery.steps.custom.js"></script>

<!-- Summernote JS -->
<script src="vendor/summernote/summernote-bs4.js"></script>

<!-- Bootstrap Select JS -->
<script src="vendor/bs-select/bs-select.min.js"></script>
<script src="vendor/bs-select/bs-select-custom.js"></script>

<!-- Dropzone JS -->
<script src="vendor/dropzone/dropzone.min.js"></script>

<!-- Input Tags JS -->
<script src="vendor/input-tags/tagsinput.min.js"></script>
<script src="vendor/input-tags/typeahead.js"></script>
<script src="vendor/input-tags/tagsinput-custom.js"></script>

<!-- Main Js Required -->
<script src="js/main.js"></script>

<script>

    // Summernote
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 120,
            tabsize: 2,
            focus: true,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'ol']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ]
        });
    });

</script>

</body>

<!-- Mirrored from bootstrap.gallery/unipro/v1-x/01-design-blue/add-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Aug 2021 04:49:57 GMT -->
</html>
