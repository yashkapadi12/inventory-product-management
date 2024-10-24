<!-- resources/views/components/toaster.blade.php -->
<div class="d-flex justify-content-center">
    @if (session('success'))                                                                                         <!-- Success -->
        <div class="alert alert-success alert-dismissible fade show text-center mx-2" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))                                                                                           <!-- Error -->
        <div class="alert alert-danger alert-dismissible fade show text-center mx-2" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $(".alert").alert('close');
        }, 5000);
    });
</script>

<style>


</style>