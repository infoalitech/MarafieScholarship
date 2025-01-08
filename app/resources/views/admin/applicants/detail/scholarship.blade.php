<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="table-responsive p-4">
        
        <h3>
            PMT Score : {{ $pmt_score }}
        </h3>
        
        @foreach($scholarshipApplicant->appliedscholarships as $scholarship)
        <div class="p-4">
            <h1 onclick="$(this).parent().find('.accordion-collapse').toggle();">
                <strong> {{$scholarship->post}} </strong>
                <hr class="p-4">

                
            </h1>
                <strong>Date:</strong>
                {{ $scholarship->pivot->apply_date}}<br>
                <strong>Remarks:</strong>{{ $scholarship->pivot->remarks}}<br>
                 <strong>Result:</strong>{{ $scholarship->pivot->status}}<br>
            <form method="post" action="{{ route('admin.applicant.detail.update')}}" >
                @csrf
                <input type="hidden" name="scholarshipApplicant" value="{{ $scholarshipApplicant->id }}">
                <input type="hidden" name="scholarship_id" value="{{ $scholarship->id }}">
                <div class="form-group">
                    <labels>Remarks</labels>
                    <input rype="text" name="review"  class="form-control">
                </div>
                
                <div class="form-group">
                    <labels>Result</labels>
                    <select name="result" class="form-control">
                        <option value="Accept">
                            Accept
                        </option>
                        <option value="Reject">
                            Reject
                        </option>
                        <option value="Review">
                            Review
                        </option>
                    </select>
                    
                </div>
                <div class="form-group my-3">
                    <input type="submit" name="submit" value="Update"  class="btn btn-primary">
                </div>
            </form>
        </div>
        @endforeach
    </div>
</div>