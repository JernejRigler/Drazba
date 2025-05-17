<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
    <h1 style="color: #3490dc;">New Auction Available!</h1>
    
    <p><strong>Item:</strong> {{ $auction->ime_izdelka }}</p>
    <p><strong>Starting Price:</strong> ${{ number_format($auction->price, 2) }}</p>
    <p><strong>Start Time:</strong> {{ $auction->datum_zacetka }}</p>
    <p><strong>Duration:</strong> {{ $auction->trajanje }}</p>
    
    <a href="{{ url('/') }}" 
       style="display: inline-block; padding: 10px 20px; background: #3490dc; color: white; text-decoration: none; border-radius: 5px;">
        View Auction
    </a>
    
    <p style="margin-top: 20px;">
        Thanks,<br>
        {{ config('app.name') }}
    </p>
</div>