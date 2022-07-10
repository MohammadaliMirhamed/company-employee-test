@extends('frontend.vendor.master')
 
@section('title', 'show organization profile')
  
@section('content')
    <div class="page">
        <main class="page-main">
            <div class="manage-budget">
                <div class="table-budget">
                    <table class="w-100">
                        <tbody>
                            @foreach($organization_profile as $profile)
                                <!-- start division-->
                                <tr>
                                    <!-- start division title -->
                                    <td class="division show">
                                        <div class="company">
                                            <form>Division
                                                <input type="text" value="{{ $profile->name }}" readonly>
                                            </form>
                                        </div>
                                    </td>
                                    <!-- end division title -->
                                    
                                    <!-- start division leader -->
                                    <td class="department admin">
                                        <div class="company">
                                            <form>
                                                <p>{{ $profile->leader->full_name }}</p><span>&nbsp; Division Lead</span>
                                            </form>
                                        </div>
                                    </td>
                                    <!-- end division leader -->

                                    <!-- start division employee -->
                                    @if($profile->members->count() > 0)
                                        @foreach($profile->members as $member)
                                            <td class="department admin">
                                                <div class="company">
                                                    <form>Division Employee
                                                        <input type="text" value="{{ $member->employee->full_name }}" readonly>
                                                    </form>
                                                </div>
                                            </td>
                                        @endforeach
                                    @endif
                                    <!-- end division employee -->

                                    <!-- start department -->
                                    @if($profile->departments->count() > 0)
                                        @foreach($profile->departments as $department)
                                            <!-- start department title -->
                                            <td class="department show">
                                                <div class="company">
                                                    <form>Department
                                                        <input type="text" value="{{ $department->name }}" readonly>
                                                    </form>
                                                </div>
                                            </td>
                                            <!-- end department title -->

                                            <td class="teams show">    
                                                <!-- start department leader -->
                                                <div class="team admin">
                                                    <div class="company">
                                                        <form>
                                                            <p>{{ $department->leader->full_name }}</p><span>&nbsp; Department Lead</span>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- end department leader -->

                                                <!-- start department employee -->
                                                @if($department->members->count() > 0)
                                                    @foreach($department->members as $member)
                                                        <div class="team admin">
                                                            <div class="company">
                                                                <form>Department Employee
                                                                    <input type="text" value="{{ $member->employee->full_name }}" readonly>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <!-- end department employee -->

                                                <!-- start team -->
                                                @if($department->teams->count() > 0)
                                                    @foreach($department->teams as $team)
                                                        <!-- start team title -->
                                                        <div class="team show">
                                                            <div class="company">
                                                                <form>Team
                                                                    <input type="text" value="{{ $team->name }}" readonly>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- end team title -->
                                                        
                                                        <!-- start team leader -->
                                                        <div class="team show">
                                                            <div class="company">
                                                                <form>
                                                                    <p>{{ $team->leader->full_name }}</p><span>&nbsp; Team Lead</span>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- end team leader -->

                                                        <!-- start team employee -->
                                                        @if($team->members->count() > 0)
                                                            @foreach($team->members as $member)
                                                                <div class="team admin">
                                                                    <div class="company">
                                                                        <form>Team Employee
                                                                            <input type="text" value="{{ $member->employee->full_name }}" readonly>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        <!-- end team employee -->
                                                    @endforeach
                                                @endif
                                                <!-- end team -->
                                            </td>
                                        @endforeach
                                    @endif
                                    <!-- end department -->
                                </tr>
                                <!-- start division-->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
@endsection