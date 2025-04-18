<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        h2 { color: #333; }
        .info { margin-bottom: 15px; }
        .label { font-weight: bold; color: #555; }
        .security { margin-top: 30px; padding-top: 15px; border-top: 1px solid #eee; }
        .security-title { color: #d9534f; }
    </style>
</head>
<body>
    <div class="container">
        <h2>New Contact Form Submission</h2>
        
        <div class="info">
            <span class="label">Name:</span> {{ $data['name'] }}
        </div>
        <div class="info">
            <span class="label">Email:</span> {{ $data['email'] }}
        </div>
        <div class="info">
            <span class="label">Phone:</span> {{ $data['phone'] ?? 'Not provided' }}
        </div>
        <div class="info">
            <span class="label">Company Name:</span> {{ $data['company_name'] ?? 'Not provided' }}
        </div>
        <div class="info">
            <span class="label">Website:</span> {{ $data['website'] ?? 'Not provided' }}
        </div>
        <div class="info">
            <span class="label">Interested In:</span> {{ $data['interest'] }}
        </div>
        <div class="info">
            <span class="label">Budget Range:</span> {{ $data['budget_range'] }}
        </div>
        <div class="info">
            <span class="label">Exact Budget:</span> {{ $data['exact_budget'] ?? 'Not specified' }}
        </div>
        <div class="info">
            <span class="label">Timeline:</span> {{ $data['timeline'] ?? 'Not specified' }}
        </div>
        <div class="info">
            <span class="label">Message:</span><br>
            {{ $data['message'] }}
        </div>
        
        <div class="security">
            <h3 class="security-title">Security Information</h3>
            <div class="info">
                <span class="label">IP Address:</span> {{ $data['ip_address'] }}
            </div>
            <div class="info">
                <span class="label">Location:</span> 
                {{ $data['city'] ?? 'Unknown' }}, {{ $data['country'] ?? 'Unknown' }}
            </div>
            <div class="info">
                <span class="label">Device:</span> {{ $data['device_type'] ?? 'Unknown' }}
            </div>
            <div class="info">
                <span class="label">Browser:</span> {{ $data['browser'] ?? 'Unknown' }}
            </div>
            <div class="info">
                <span class="label">OS:</span> {{ $data['operating_system'] ?? 'Unknown' }}
            </div>
            <div class="info">
                <span class="label">Suspected Bot:</span> {{ $data['is_bot'] ? 'Yes' : 'No' }}
            </div>
            <div class="info">
                <span class="label">Submitted At:</span> {{ now()->format('Y-m-d H:i:s') }}
            </div>
        </div>
    </div>
</body>
</html>