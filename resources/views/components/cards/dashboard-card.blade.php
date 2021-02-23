<div class="tab-pane fade active show" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
    <div class="employer-item">
        <a href="{{ route('showRequest', $cardData->id) }}">
            <img src="https://cdn0.iconfinder.com/data/icons/business-e-commerce-logistics-import-export/500/boxglobe-512.png"
                width="50px">
            <h3>#{{ $cardData->id }}</h3>
            <ul>
                <li>
                    <i class="bx bx-transfer"></i>
                    {{ $cardData->brand }}
                </li>
                <li>Model: {{ $cardData->model }}</li>
            </ul>
            <strong class="text-black-50">Description</strong>
            <p>{{ $cardData->part_desc }}</p>
            <p class="mb-1">
                <strong>Part No:</strong>
                {{ $cardData->brand }}
            </p>
            <p>
                <strong>QTY:</strong>
                {{ $cardData->qty }}
            </p>
            <div class="row">
                <div class="col">
                    <span class="span-one">View More</span>
                    <a href="{{ route('showQuotation', $cardData->id) }}"><span class="span-one">View Quotations</span></a>
                </div>
                <div class="col">
                    <a href="{{ route('destroyRequest', $cardData->id) }}"><span class="span-two">Remove</span></a>
                </div>
            </div>
        </a>
    </div>
</div>
