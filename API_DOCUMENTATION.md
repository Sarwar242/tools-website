# ToolHub API Documentation

## Base URL
```
http://your-domain.com/api/v1
```

## API Version
Current version: **v1**

---

## Endpoints

### Generate Hashes

Generate multiple hash types for a given input string.

**Endpoint:** `POST /api/v1/hash`

**Request Headers:**
```
Content-Type: application/json
X-CSRF-TOKEN: {token} (required for web requests)
Accept: application/json
```

**Request Body:**
```json
{
  "input": "password123"
}
```

**Request Parameters:**
| Parameter | Type | Required | Max Length | Description |
|-----------|------|----------|------------|-------------|
| input | string | Yes | 10000 | The text to generate hashes for |

**Success Response (200):**
```json
{
  "success": true,
  "data": {
    "hashes": {
      "bcrypt": "$2y$12$abcdefghijklmnopqrstuv...",
      "md5": "482c811da5d5b4bc6d497ffa98491e38",
      "sha1": "cbfdac6008f9cab4083784cbd1874f76618d2a97",
      "sha256": "ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f",
      "sha512": "bed4efa1d4fdbd954bd3705d6a2a78270ec9a52ecfbfb010c61862af5c76af17..."
    },
    "input_length": 11,
    "timestamp": "2025-01-10T12:34:56+00:00"
  }
}
```

**Error Response (422 - Validation Error):**
```json
{
  "message": "The input field is required.",
  "errors": {
    "input": [
      "The input field is required."
    ]
  }
}
```

**Error Response (500 - Server Error):**
```json
{
  "success": false,
  "error": {
    "message": "Failed to generate hashes",
    "details": "Error details (only in debug mode)"
  }
}
```

---

## Hash Types

### Bcrypt
- **Format:** `$2y$12$...` (Laravel format)
- **Usage:** Password hashing (recommended for production)
- **Security:** Strong, resistant to brute-force attacks
- **Cost Factor:** 12 (Laravel default)

### MD5
- **Length:** 32 characters
- **Usage:** Checksums, non-security purposes
- **Security:** ⚠️ Not recommended for passwords (broken)

### SHA-1
- **Length:** 40 characters
- **Usage:** Legacy systems, checksums
- **Security:** ⚠️ Not recommended for passwords (broken)

### SHA-256
- **Length:** 64 characters
- **Usage:** Digital signatures, SSL certificates
- **Security:** Strong, suitable for most applications

### SHA-512
- **Length:** 128 characters
- **Usage:** High-security applications
- **Security:** Very strong, slower than SHA-256

---

## Rate Limiting

Currently, there is no rate limiting implemented. This will be added in future versions.

**Planned limits:**
- 100 requests per minute per IP
- 1000 requests per hour per IP

---

## Error Codes

| HTTP Code | Description |
|-----------|-------------|
| 200 | Success |
| 422 | Validation Error |
| 429 | Too Many Requests (rate limit) |
| 500 | Internal Server Error |

---

## Usage Examples

### cURL
```bash
curl -X POST http://your-domain.com/api/v1/hash \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -H "X-CSRF-TOKEN: your-csrf-token" \
  -d '{"input": "password123"}'
```

### JavaScript (Fetch API)
```javascript
const response = await fetch('/api/v1/hash', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
    'Accept': 'application/json'
  },
  body: JSON.stringify({ input: 'password123' })
});

const data = await response.json();
console.log(data.data.hashes.bcrypt);
```

### PHP
```php
$ch = curl_init('http://your-domain.com/api/v1/hash');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Accept: application/json'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'input' => 'password123'
]));

$response = curl_exec($ch);
$data = json_decode($response, true);
echo $data['data']['hashes']['bcrypt'];
```

### Python
```python
import requests

url = 'http://your-domain.com/api/v1/hash'
headers = {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
}
payload = {'input': 'password123'}

response = requests.post(url, json=payload, headers=headers)
data = response.json()
print(data['data']['hashes']['bcrypt'])
```

---

## Changelog

### v1 (2025-01-10)
- Initial API release
- Added hash generation endpoint
- Support for Bcrypt, MD5, SHA-1, SHA-256, SHA-512

---

## Support

For issues or feature requests, please contact: support@your-domain.com

---

## Security

- All bcrypt hashes are generated server-side using Laravel's `Hash::make()`
- CSRF protection is enabled for web requests
- Input is sanitized and validated
- Maximum input length: 10,000 characters
