<x-guest-layout>
    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>

                <img width="120px;" src="{{ asset('assets/img/logo.png')}}">
                
            </div>

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
            
            <h1>Privacy Policy</h1>

                <ul>

                    <li>Collect only necessary information.</li>
                    <li>Obtain consent for data collection.</li>
                    <li>Store data securely.</li>
                    <li>Provide option for data access/correction.</li>
                    <li>Explain how data will be used.</li>
                    <li>Disclose data sharing practices.</li>
                    <li>Provide means to file complaint.</li>

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
