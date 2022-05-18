
<div class="row budget-form ">

    <div class="col col-xs-12">

        <div class="card budget-card border-danger ">
            <div class="card-header">
                Create your budget
            </div>
            <div class="card-body">
                <p class="card-text">
                    @include('components.budget.budgetForm')
                </p>
            </div>
        </div>
    </div>

    <div class="col form-budget-card col-xs-12">
        @include('components.budget.budgetChart')
    </div>
</div>

        
<div class="row">
    <div class="col">
        <hr><br><br>
        @include('components.budget.budgetTable')
    </div>
</div>


 