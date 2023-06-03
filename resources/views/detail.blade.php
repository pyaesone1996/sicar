<x-landing-layout>
  <div  class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-4">
       <div class="flex flex-nowrap">
          <div class="w-2/5">
            {{$car['Images']}}
            <img src="{{$car['Images']}}" alt="car">
          </div>
          <div class="w-3/5">

          </div>
       </div>
  </div>
</x-landing-layout>