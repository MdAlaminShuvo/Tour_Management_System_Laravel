<x-guest-layout>
    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>

                <img width="120px;" src="{{ asset('assets/img/logo.png')}}">

            </div>

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                <h1>Terms of Condition</h1>
                <ul>
                    <li>Any complain from tourist granted within 7 days after completed tour</li>
                    <li>Payment will be send to local guide or host within 7 days after completed tour</li>
                </ul> 

                    <br> 

                <h1>Return Policy</h1>
                <ul>

                    <li>Before 7 days of tour 100% return money available</li>
                    <li>Before 3 days of tour 80% return money available</li>
                    <li>Before 2 days of tour no return money available</li>

                </ul>
            </div>
        </div>
    </div>
</x-guest-layout>


<style>

    ul {

        list-style: none;

    }

    ul li::before {

        content: "\2022";
        color: red;
        font-weight: bold;
        display: inline-block; 
        width: 1em;
        margin-left: -1.5em;

    }
    
</style>