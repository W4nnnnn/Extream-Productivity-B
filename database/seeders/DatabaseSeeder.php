<?php

namespace Database\Seeders;

use App\Models\Cycle;
use App\Models\Task;
use App\Models\Objective;
use App\Models\KeyResult;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create cycle
        $cycle = Cycle::create([
            'name' => 'Q4-2025',
        ]);

        // Strategies
        $strategies = [
            '01. Managerial Leverage',
            '02. Clear Objectives & Key Results (OKRs)',
            '03. Optimize Processes',
            '04. Effective Meetings',
            '05. Training & Development',
            '06. Feedback Mechanisms',
            '07. Task-Relevant Maturity',
            '08. Cultural Alignment',
            '09. Use of Technology',
            '10. Self-Assessment & Reflection'
        ];

        // Tasks data
        $tasksData = [
            [
                'strategy' => $strategies[0],
                'task' => 'Audit aktivitas 2 minggu: identifikasi 20% pekerjaan high-impact & eliminasi/otomasi 10% low-value.',
                'owner' => 'Head Ops',
                'start_delta' => 0,
                'due_delta' => 14,
                'status' => 'In Progress',
                'progress' => 40,
                'kpi' => '% waktu high-impact',
                'target' => '≥ 70%',
                'notes' => ''
            ],
            [
                'strategy' => $strategies[1],
                'task' => 'Tetapkan 3 Objective & 8-10 KR terukur; publikasikan di dashboard tim.',
                'owner' => 'PMO',
                'start_delta' => 0,
                'due_delta' => 10,
                'status' => 'In Progress',
                'progress' => 30,
                'kpi' => 'KR terdefinisi lengkap',
                'target' => '≥ 90%',
                'notes' => ''
            ],
            [
                'strategy' => $strategies[2],
                'task' => 'Pemetaan value stream + hilangkan 3 waste utama; set WIP limit.',
                'owner' => 'Ops Excellence',
                'start_delta' => 5,
                'due_delta' => 25,
                'status' => 'Not Started',
                'progress' => 0,
                'kpi' => 'Lead time (hari)',
                'target' => '≤ 5',
                'notes' => ''
            ],
            [
                'strategy' => $strategies[3],
                'task' => 'Standard meeting: agenda jelas, notulen & aksi ter-assign; batasi durasi 25/50 menit.',
                'owner' => 'All Managers',
                'start_delta' => 3,
                'due_delta' => 18,
                'status' => 'In Progress',
                'progress' => 50,
                'kpi' => '% meeting on-time',
                'target' => '≥ 85%',
                'notes' => ''
            ],
            [
                'strategy' => $strategies[4],
                'task' => 'Rancang kurikulum microlearning mingguan (60 menit) + mentoring.',
                'owner' => 'People Dev',
                'start_delta' => 7,
                'due_delta' => 30,
                'status' => 'Not Started',
                'progress' => 0,
                'kpi' => 'Jam pelatihan/pegawai',
                'target' => '≥ 2/jam bln',
                'notes' => ''
            ],
            [
                'strategy' => $strategies[5],
                'task' => 'Implementasi weekly 1:1 dan feedback 360° triwulanan.',
                'owner' => 'People Manager',
                'start_delta' => 2,
                'due_delta' => 20,
                'status' => 'In Progress',
                'progress' => 35,
                'kpi' => 'Frekuensi 1:1',
                'target' => '≥ 90% terselenggara',
                'notes' => ''
            ],
            [
                'strategy' => $strategies[6],
                'task' => 'Segmentasi TRM: tentukan tingkat bimbingan per individu; rencana coaching 8 minggu.',
                'owner' => 'Leads',
                'start_delta' => 1,
                'due_delta' => 21,
                'status' => 'Not Started',
                'progress' => 0,
                'kpi' => 'Autonomy score',
                'target' => '↑ 20%',
                'notes' => ''
            ],
            [
                'strategy' => $strategies[7],
                'task' => 'Deklarasi nilai & prinsip operasional; integrasi ke SOP dan penilaian.',
                'owner' => 'Culture Council',
                'start_delta' => 6,
                'due_delta' => 28,
                'status' => 'Not Started',
                'progress' => 0,
                'kpi' => '% karyawan paham nilai',
                'target' => '≥ 95%',
                'notes' => ''
            ],
            [
                'strategy' => $strategies[8],
                'task' => 'Pilih & implement 2 alat otomasi (mis: template OKR, bot notulen).',
                'owner' => 'Automation Team',
                'start_delta' => 4,
                'due_delta' => 24,
                'status' => 'In Progress',
                'progress' => 20,
                'kpi' => 'Jam hemat/bulan',
                'target' => '≥ 80 jam',
                'notes' => ''
            ],
            [
                'strategy' => $strategies[9],
                'task' => 'Ritual refleksi bulanan: review metrik, pelajaran, & perbaikan.',
                'owner' => 'All Hands',
                'start_delta' => 12,
                'due_delta' => 40,
                'status' => 'Not Started',
                'progress' => 0,
                'kpi' => 'Aksi perbaikan ditutup',
                'target' => '≥ 80%',
                'notes' => ''
            ]
        ];

        foreach ($tasksData as $taskData) {
            Task::create([
                'strategy' => $taskData['strategy'],
                'task' => $taskData['task'],
                'owner' => $taskData['owner'],
                'start' => Carbon::now()->addDays($taskData['start_delta']),
                'due' => Carbon::now()->addDays($taskData['due_delta']),
                'status' => $taskData['status'],
                'progress' => $taskData['progress'],
                'kpi' => $taskData['kpi'],
                'target' => $taskData['target'],
                'notes' => $taskData['notes'],
                'cycle_id' => $cycle->id,
            ]);
        }

        // Objectives data
        $objectivesData = [
            [
                'objective' => 'Meningkatkan output tim 30% dalam 90 hari',
                'owner' => 'Head Ops',
                'keyResults' => [
                    ['kr' => 'Throughput fitur selesai/bulan', 'baseline' => 12, 'target' => 16, 'current' => 13],
                    ['kr' => 'Rata-rata WIP', 'baseline' => 14, 'target' => 8, 'current' => 11],
                    ['kr' => 'Skor kepuasan karyawan', 'baseline' => 4.2, 'target' => 4.5, 'current' => 4.3]
                ]
            ]
        ];

        foreach ($objectivesData as $objData) {
            $objective = Objective::create([
                'objective' => $objData['objective'],
                'owner' => $objData['owner'],
                'cycle_id' => $cycle->id,
            ]);

            foreach ($objData['keyResults'] as $krData) {
                KeyResult::create([
                    'objective_id' => $objective->id,
                    'kr' => $krData['kr'],
                    'baseline' => $krData['baseline'],
                    'target' => $krData['target'],
                    'current' => $krData['current'],
                ]);
            }
        }
    }
}
