<!DOCTYPE html>
<html>
<head>
    <title>Certificate</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .certificate { border: 10px solid #ddd; padding: 20px; margin: 20px auto; width: 700px; }
        .certificate h1 { font-size: 36px; margin-bottom: 20px; }
        .name { font-size: 24px; font-weight: bold; }
        .date, .unique-number { font-size: 18px; }
    </style>
</head>
<body>
    <div class="certificate">
        <h1>Certificate of Achievement</h1>
        <p class="name">{{ $certificate->name }}</p>
        <p>has successfully completed the course</p>
        <p class="date">Date Issued: {{ $certificate->date_issued_formatted }}</p>
        <p class="unique-number">Certificate Number: {{ $certificate->unique_number }}</p>
    </div>
</body>
</html>