<x-landing-layout>
    @if (Session::has('error')) {{--
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Error !</strong> {{ session("error") }}
    </div>
    --}}
    <div class="rounded-md mt-5 bg-red-50 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg
                    class="h-5 w-5 text-red-400"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                        clip-rule="evenodd"
                    />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800">
                    We regret to inform you that the car is currently
                    unavailable. We apologize for any inconvenience caused.
                </h3>
            </div>
        </div>
    </div>
    @endif

    <div
        id="content"
        class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-4"
    ></div>

    <script>
        $(document).ready(function () {
            $.ajax({
                url: "/cars",
                type: "GET",
                dataType: "html",
                success: function (response) {
                    // Insert the HTML into the element with ID "content"
                    $("#content").html(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Handle any errors here
                    console.error(textStatus, errorThrown);
                },
            });
        });
    </script>
</x-landing-layout>
