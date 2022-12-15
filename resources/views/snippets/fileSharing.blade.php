{{-- file sharing modal --}}
<div class="card-body my-0">
    <!--Basic Modal -->
    <div class="modal fade text-left" id="fileuploader" tabindex="-1" aria-labelledby="myModalLabel1"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header" style="display: flex;justify-content: space-between">

                    <h4 class="modal-title" id="myModalLabel1">Upload File</h4>

                    <button type="button" class="close rounded-pill"
                            style="background-color: white;outline:none;font-size: 20px;font-weight:bolder;color: black"
                            data-bs-dismiss="modal" aria-label="Close">
                        x
                    </button>
                </div>
                <div class="modal-body" style="overflow-y: auto;">
                    <div class="card-content pb-4">

                        <form class="flex items-center space-x-6" method="POST"
                              enctype="multipart/form-data" action="{{ route('home') }}">
                            @csrf
                            <label class="block mb-3">
                                <span style="padding-right: 10px;">Choose a file/folder</span>
                                <input type="file" name="file" class="uploadBox block
                                             w-full text-sm text-slate-50 file:mr-4 file:py-2 file:px-4
                                          " required/>

                            </label>
                            <label class="block mb-4">
                                <span class="sr-only">Choose a Branch :</span>
                                <input type="text" name="name"
                                       class="  my_input"
                                />

                            </label>
                            <label class="block mb-4">
                                <span class="sr-only">Choose a Department :</span>
                                <input type="text" name="name"
                                       class=" my_input"/>

                            </label>
                            <label class="block mb-4">
                                <span class="sr-only">Choose a Name :</span>
                                <select name="receiver"
                                        class=" my_input">
                                    @foreach($users as $user)
                                    <option value={{$user->id}}>{{$user->firstname}} {{$user->lastname}} </option>
                                    @endforeach
                                </select>


                            </label>
                            <div class="px-5">
                                <button class='btn btn-block btn-success font-bold mt-2'>Share</button>
                            </div>
                        </form>


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- end file sharing modal --}}