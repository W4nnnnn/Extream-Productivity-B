# API Documentation for Extream Productivity Backend

## Setup
1. Jalankan migrations: `php artisan migrate`
2. Jalankan server: `php artisan serve`
3. Server akan berjalan di `http://localhost:8000`

## API Endpoints

Semua endpoint menggunakan prefix `/api/`

### Cycles
- **GET /api/cycles** - Mendapatkan semua cycles
- **GET /api/cycles/{id}** - Mendapatkan cycle tertentu
- **POST /api/cycles** - Membuat cycle baru
  - Body: `{"name": "Q4-2025"}`
- **PUT /api/cycles/{id}** - Update cycle
- **DELETE /api/cycles/{id}** - Hapus cycle

### Tasks
- **GET /api/tasks** - Mendapatkan semua tasks
- **GET /api/tasks/{id}** - Mendapatkan task tertentu
- **POST /api/tasks** - Membuat task baru
  - Body: `{"strategy": "01. Managerial Leverage", "task": "Deskripsi task", "owner": "Head Ops", "start": "2024-10-01", "due": "2024-10-15", "status": "In Progress", "progress": 40, "kpi": "% waktu high-impact", "target": "≥ 70%", "notes": "", "cycle_id": 1}`
- **PUT /api/tasks/{id}** - Update task
- **DELETE /api/tasks/{id}** - Hapus task

### Objectives
- **GET /api/objectives** - Mendapatkan semua objectives dengan key results
- **GET /api/objectives/{id}** - Mendapatkan objective tertentu dengan key results
- **POST /api/objectives** - Membuat objective baru
  - Body: `{"objective": "Meningkatkan output tim 30% dalam 90 hari", "owner": "Head Ops", "cycle_id": 1}`
- **PUT /api/objectives/{id}** - Update objective
- **DELETE /api/objectives/{id}** - Hapus objective

### Key Results
- **GET /api/key-results** - Mendapatkan semua key results
- **GET /api/key-results/{id}** - Mendapatkan key result tertentu
- **POST /api/key-results** - Membuat key result baru
  - Body: `{"objective_id": 1, "kr": "Throughput fitur selesai/bulan", "baseline": 12, "target": 16, "current": 13}`
- **PUT /api/key-results/{id}** - Update key result
- **DELETE /api/key-results/{id}** - Hapus key result

## Contoh Response

### GET /api/cycles
```json
[
  {
    "id": 1,
    "name": "Q4-2025",
    "created_at": "2024-10-01T00:00:00.000000Z",
    "updated_at": "2024-10-01T00:00:00.000000Z"
  }
]
```

### GET /api/objectives
```json
[
  {
    "id": 1,
    "objective": "Meningkatkan output tim 30% dalam 90 hari",
    "owner": "Head Ops",
    "cycle_id": 1,
    "created_at": "2024-10-01T00:00:00.000000Z",
    "updated_at": "2024-10-01T00:00:00.000000Z",
    "key_results": [
      {
        "id": 1,
        "objective_id": 1,
        "kr": "Throughput fitur selesai/bulan",
        "baseline": 12,
        "target": 16,
        "current": 13,
        "created_at": "2024-10-01T00:00:00.000000Z",
        "updated_at": "2024-10-01T00:00:00.000000Z"
      }
    ]
  }
]
```

## Testing dengan Postman atau Curl

### Contoh Curl untuk GET
```bash
curl -X GET http://localhost:8000/api/cycles
```

### Contoh Curl untuk POST
```bash
curl -X POST http://localhost:8000/api/cycles \
  -H "Content-Type: application/json" \
  -d '{"name": "Q1-2025"}'
```

## Catatan
- Pastikan server Laravel sedang berjalan (`php artisan serve`)
- Semua request POST/PUT memerlukan header `Content-Type: application/json`
- Validation error akan dikembalikan dengan status 422
- Resource not found akan dikembalikan dengan status 404
