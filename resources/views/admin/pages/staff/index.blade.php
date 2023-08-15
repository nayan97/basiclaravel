@extends('admin.layouts.app')
@section('main-section')
			
                <div class="row">
						<div class="col-md-8">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Staffs</h4>
								</div>
								<div class="card-body">
                                    
                                    @include('validate')


                                    <table class="table table-striped">
                                        <thead> 
                                                <tr>
                                                <td>#</td>
                                                <td>Name</td>
                                                <td>Stack</td>
                                                <td>Skill</td>
                                                <td>photo</td>
                            
                                                <td>Created at</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      

                                        @forelse ($data as $item)
                                        <tr>
                                            <td>{{$loop ->index + 1}}</td>
                                            <td>{{$item -> name}}</td>
                                            <td>{{$item -> stack}}</td>
                                          
                                            <td> 
                                                <ul>
                                                     @forelse (json_decode($item -> skills) as $kaj) 
                                                        <li style="">{{ $kaj }},</li>
                                                    @empty
                                                    @endforelse
                                                 
                                                </ul>
                                            </td>
                                            <td><img style="width: 60px; height: 60px; object-fit: cover;" src="{{ url('storage/staff/' . $item -> photo)}}" alt=""></td>
                                            <td>{{$item -> created_at -> diffForHumans()}}</td>
                                            <td>
                                                <!----<a class="btn btn-sm btn-info" href="#"><i class="fe fe-eye"></i></a>-->
                                                <a class="btn btn-sm btn-warning" href="{{ route('staffs.edit', $item -> id)}}"><i class="fe fe-edit"></i></a>
                                                <form onclick="return confirm('Are you sure to delete this')" action="{{ route('staffs.destroy', $item ->      id ) }}" class="d-inline delete-form" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                       </tr> 
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <p>No Data Found</p>
                                            </td>
                                        </tr>
                                       
                                        @endforelse
                                           
                                     
                                        </tbody>
                                    </table>
								
								</div>
							</div>
						</div>
						<div class="col-md-4">

                            @if( $type === 'add')
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Add new Data</h4>
								</div>
								<div class="card-body">


									<form action="{{ route('staffs.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
										<div class="form-group">
											<label>Name</label>
											<input name="name" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
											<label>Stack</label>
											<input name="stack" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
											<label>Profile Description</label>
											<textarea name="profile" rows="4" cols="50">
                                            </textarea >  
                                        </div>
                                         
                                        <div class="form-group">
											<label>Gender</label><br>
											<input name="gender" type="radio" value="male">Male
                                            <br>
                                            <input name="gender" type="radio" value="female">Female
                                        </div>
                                 
                                        <div class="form-group">
											<label>Skills</label>  
                                            <ul class="">
                                               
                                            @foreach ($skill as $skills)
													<li> 
														<label><input name="skills[]" value="{{ $skills -> name }}" type="checkbox"> {{ $skills -> name }}</label> 
													</li>
												@endforeach
											</ul>                      
										
										</div>   
                                        <div class="form-group">
											<label>Photo</label>
                                            <br>
										    <input name="photo" type="file">
                                        </div>

										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
                            @endif
                            
                            @if( $type === 'edit')
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Update staff Data</h4>
								</div>
								<div class="card-body">

									<form action="{{ route('staffs.update', $staff-> id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
										<div class="form-group">
											<label>Name</label>
											<input name="name" value="{{ $staff -> name}}" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
											<label>Stack</label>
											<input name="stack" value="{{ $staff -> stack}}" type="text" class="form-control">

                                        </div>
                                        <div class="form-group">
											<label>Profile Description</label>
											<textarea name="profile" rows="4" cols="50">{{ $staff -> profile}}</textarea >  
                                        </div>
                                         
                                        <div class="form-group">
											<label>Gender</label><br>


											<input name="gender" type="radio" value="male" @if ($staff->gender == "male")checked 
                                                
                                            @endif>Male
                                            <br>
                                            <input name="gender" type="radio" value="female" @if ($staff->gender == "male")checked 
                                                
                                                @endif">Female
                                        </div>
                                      
                                        <div class="form-group">
											<label>Skills</label>                        
											<ul>
                                           

                                                @forelse ( json_decode($skill)  as $skills)
                                                    <li>
                                                        <label><input @if( in_array($skills -> name, json_decode($staff -> skills)) ) checked @endif name="skills[]" value="{{ $skills -> name }}" type="checkbox"> {{$skills -> name}}</label>
                                                    </li>                                
                                                @empty
                                                    <li>No record found</li>
                                                @endforelse
												
											</ul>
										</div>  
                                        <div class="form-group">
											<label>Photo</label>
                                            <br>
                                            <img style="width: 60px; height: 60px; object-fit: cover;" src="{{ url('storage/staff/' . $staff -> photo)}}" alt="">
										    <input name="photo" type="file">
                                        </div>
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Update</button>
										</div>
									</form>
								</div>
							</div>
                            @endif


						</div>
					</div>

               
                
       
        
	<!-- /Page Wrapper -->

@endsection
