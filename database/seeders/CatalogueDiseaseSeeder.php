<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogueDiseaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('diseases')->insert([

            [
                'name' => 'Fibromialgia',
            ],
            [
                'name' => 'Dolores de cabeza',
            ],
            [
                'name' => 'Artrosis',
            ],
            [
                'name' => 'Codo de tenista',
            ],
            [
                'name' => 'Dolor de cuello',
            ],
            [
                'name' => 'Condromalacia patelar',
            ],
            [
                'name' => 'Ácaros de cosecha',
            ],
            [
                'name' => 'Ácaros rojos',
            ],
            [
                'name' => 'Alergia a las proteínas de la leche (niño pequeño)',
            ],
            [
                'name' => 'Alergia al moho, la caspa y el polvo',
            ],
            [
                'name' => 'Alergia alimentaria',
            ],
            [
                'name' => 'Alergia de insectos',
            ],
            [
                'name' => 'Alergias',
            ],
            [
                'name' => 'Alergias a fármacos',
            ],
            [
                'name' => 'Alergias a las mascotas',
            ],
            [
                'name' => 'Alergias en ambientes interiores',
            ],
            [
                'name' => 'Asma',
            ],
            [
                'name' => 'Asma bronquial',
            ],
            [
                'name' => 'Asma inducido por el ejercicio',
            ],
            [
                'name' => 'Asma ocupacional',
            ],
            [
                'name' => 'Asma pediátrico',
            ],
            [
                'name' => 'Aspergilosis broncopulmonar alérgica',
            ],
            [
                'name' => 'Bisinosis',
            ],
            [
                'name' => 'Bronquitis ocupacional',
            ],
            [
                'name' => 'Conjuntivitis',
            ],
            [
                'name' => 'Conjuntivitis alérgica',
            ],
            [
                'name' => 'Coronavirus COVID-19',
            ],
            [
                'name' => 'Dermatitis alérgica',
            ],
            [
                'name' => 'Dermatitis atópica',
            ],
            [
                'name' => 'Dermatitis del pañal',
            ],
            [
                'name' => 'Dermatitis por contacto',
            ],
            [
                'name' => 'Encina venenosa',
            ],
            [
                'name' => 'Enfermedad causada por las brácteas del algodón',
            ],
            [
                'name' => 'Enfermedad de los recolectores de hongos',
            ],
            [
                'name' => 'Enfermedad reactiva de las vías respiratorias inducida por irritantes',
            ],
            [
                'name' => 'Eritema multiforme',
            ],
            [
                'name' => 'Erupción polimórfica leve',
            ],
            [
                'name' => 'Fiebre de los molinos',
            ],
            [
                'name' => 'Fiebre del heno',
            ],
            [
                'name' => 'Hipoacusia en bebés',
            ],
            [
                'name' => 'Hipoacusia relacionada con la edad',
            ],
            [
                'name' => 'Infecciones de vías respiratorias de repetición (o recurrentes)',
            ],
            [
                'name' => 'Infecciones frecuentes de garganta',
            ],
            [
                'name' => 'Inflamación lingual',
            ],
            [
                'name' => 'Mordeduras de araña',
            ],
            [
                'name' => 'Picaduras de alacrán',
            ],
            [
                'name' => 'Reacción alérgica a una droga (medicamento)',
            ],
            [
                'name' => 'Reacción anafiláctica',
            ],
            [
                'name' => 'Rinitis alérgica',
            ],
            [
                'name' => 'Ronchas',
            ],
            [
                'name' => 'Ronchas o habones',
            ],
            [
                'name' => 'Shock anafiláctico',
            ],
            [
                'name' => 'Trastornos por inmunodeficiencia',
            ],
            [
                'name' => 'Urticaria',
            ],
            [
                'name' => 'Urticaria pigmentosa',
            ],
            [
                'name' => 'Vasculitis alérgica',
            ],
            [
                'name' => 'Abetalipoproteinemia',
            ],
            [
                'name' => 'Androblastoma',
            ],
            [
                'name' => 'Enfermedad de Batten',
            ],
            [
                'name' => 'Enfermedad de Kufs',
            ],
            [
                'name' => 'Enfermedad de los depósitos densos',
            ],
            [
                'name' => 'Envenenamiento por hongos',
            ],
            [
                'name' => 'Envenenamiento por plantas tóxicas',
            ],
            [
                'name' => 'Exceso de hormona del crecimiento',
            ],
            [
                'name' => 'Familia de tumores de Ewing',
            ],
            [
                'name' => 'Intoxicación por cáusticos',
            ],
            [
                'name' => 'Intoxicación por gas',
            ],
            [
                'name' => 'Intoxicación por metanol',
            ],
            [
                'name' => 'Intoxicación por monóxido de carbono',
            ],
            [
                'name' => 'Intoxicación por plomo',
            ],
            [
                'name' => 'Intoxicación por químicos del hogar',
            ],
            [
                'name' => 'Intoxicación por talio',
            ],
            [
                'name' => 'Leucoplasia vellosa',
            ],
            [
                'name' => 'Lipofuscinosis neuronal ceroidea',
            ],
            [
                'name' => 'Mordeduras de serpiente',
            ],
            [
                'name' => 'Queratosis=> tumores benignos de la piel',
            ],
            [
                'name' => 'Quiste o tumor benigno de oído',
            ],
            [
                'name' => 'Rabdomiosarcoma alveolar',
            ],
            [
                'name' => 'Rabdomiosarcoma embrionario',
            ],
            [
                'name' => 'Sobredosis de medicamentos',
            ],
            [
                'name' => 'Teratoma=> tumor de células germinales no seminomatosas',
            ],
            [
                'name' => 'Trombocitosis esencial',
            ],
            [
                'name' => 'Tumor testicular',
            ],
            [
                'name' => 'Algodistrofia del miembro superior',
            ],
            [
                'name' => 'Dolor de nervio o dolor nervioso',
            ],
            [
                'name' => 'Dolor oncológico',
            ],
            [
                'name' => 'Dolor somático',
            ],
            [
                'name' => 'Edema por insuficiencia venosa crónica',
            ],
            [
                'name' => 'Dolor terminal',
            ],
            [
                'name' => 'Falla cardíaca',
            ],
            [
                'name' => 'Fracturas de dientes',
            ],
            [
                'name' => 'Fracturas por compresión o aplastamiento vertebral',
            ],
            [
                'name' => 'Hiperpirexia maligna',
            ],
            [
                'name' => 'Hipertermia maligna',
            ],
            [
                'name' => 'Insuficiencia cardíaca congestiva',
            ],
            [
                'name' => 'Insuficiencia cardíaca izquierda',
            ],
            [
                'name' => 'Neuralgia glosofaríngea',
            ],
            [
                'name' => 'Síndrome de dolor pélvico',
            ],
            [
                'name' => 'Síndrome de dolor regional complejo',
            ],
            [
                'name' => 'Varicosis',
            ],
            [
                'name' => 'Accidente cerebrovascular secundario a disección carotídea',
            ],
            [
                'name' => 'Accidente cerebrovascular secundario a displasia fibromuscular',
            ],
            [
                'name' => 'Accidente cerebrovascular sifilítico',
            ],
            [
                'name' => 'Acumulación de placa en las arterias',
            ],
            [
                'name' => 'Aneurisma',
            ],
            [
                'name' => 'Aneurisma aórtico',
            ],
            [
                'name' => 'Aneurisma aórtico abdominal',
            ],
            [
                'name' => 'Aneurisma aórtico disecante',
            ],
            [
                'name' => 'Aneurisma de la aorta torácica',
            ],
            [
                'name' => 'Aneurisma sifilítico',
            ],
            [
                'name' => 'Angioedema',
            ],
            [
                'name' => 'Angiomas del colon',
            ],
            [
                'name' => 'Arterioesclerosis',
            ],
            [
                'name' => 'Arterioesclerosis de las extremidades',
            ],
            [
                'name' => 'Arterioesclerosis obliterante',
            ],
            [
                'name' => 'Arteriopatía periférica',
            ],
            [
                'name' => 'Arteriosclerosis',
            ],
            [
                'name' => 'Ateroembolia renal',
            ],
            [
                'name' => 'Ateroesclerosis',
            ],
            [
                'name' => 'Bloqueo de la vena cava superior',
            ],
            [
                'name' => 'BRAO',
            ],
            [
                'name' => 'BRVO',
            ],
            [
                'name' => 'CAA',
            ],
            [
                'name' => 'Cambios vasculares de la piel',
            ],
            [
                'name' => 'Cáncer de pulmón',
            ],
            [
                'name' => 'Coágulo en la vena renal',
            ],
            [
                'name' => 'Coágulo en las piernas',
            ],
            [
                'name' => 'Coartación de la aorta',
            ],
            [
                'name' => 'Crioglobulinemia',
            ],
            [
                'name' => 'Displasia fibromuscular (DFM)',
            ],
            [
                'name' => 'Disección aórtica',
            ],
            [
                'name' => 'DVT',
            ],
            [
                'name' => 'Embolia arterial',
            ],
            [
                'name' => 'Embolia arterial renal',
            ],
            [
                'name' => 'Émbolo',
            ],
            [
                'name' => 'Émbolo tumoral',
            ],
            [
                'name' => 'Endurecimiento de las arterias',
            ],
            [
                'name' => 'Enfermedad ateroembólica de los riñones',
            ],
            [
                'name' => 'Enfermedad cerebrovascular',
            ],
            [
                'name' => 'Enfermedad de Buerger',
            ],
            [
                'name' => 'Enfermedad de las arterias coronarias o coronariopatía',
            ],
            [
                'name' => 'Enfermedad renal ateroembólica',
            ],
            [
                'name' => 'Enfermedad renal ateroesclerótica',
            ],
            [
                'name' => 'Enfermedad vascular periférica',
            ],
            [
                'name' => 'Enfermedad venooclusiva hepática',
            ],
            [
                'name' => 'Enfermedad venooclusiva pulmonar',
            ],
            [
                'name' => 'Espasmo vascular',
            ],
            [
                'name' => 'Estados hipercoagulables',
            ],
            [
                'name' => 'Estados tromboembólicos',
            ],
            [
                'name' => 'Estenosis arterial renal',
            ],
            [
                'name' => 'EVP',
            ],
            [
                'name' => 'Factor V de Leiden',
            ],
            [
                'name' => 'Fibrinólisis',
            ],
            [
                'name' => 'Fisiología de Eisenmenger',
            ],
            [
                'name' => 'Fístula arteriovenosa pulmonar',
            ],
            [
                'name' => 'Fístula de la arteria coronaria',
            ],
            [
                'name' => 'Flebitis',
            ],
            [
                'name' => 'Flegmasía alba dolorosa',
            ],
            [
                'name' => 'Flegmasía cerúlea dolorosa',
            ],
            [
                'name' => 'Gangrena',
            ],
            [
                'name' => 'Gangrena de tejidos blandos',
            ],
            [
                'name' => 'Granulomatosis de la mediana edad',
            ],
            [
                'name' => 'Hemangiectasia hipertrófica',
            ],
            [
                'name' => 'Hemangioma',
            ],
            [
                'name' => 'Hemangioma aracniforme',
            ],
            [
                'name' => 'Hemangioma capilar',
            ],
            [
                'name' => 'Hemangioma capilar congénito o nevo flamígero',
            ],
            [
                'name' => 'Hemangioma hepático',
            ],
            [
                'name' => 'Hemangioma senil',
            ],
            [
                'name' => 'Hemangiomatosis hepática multinodular',
            ],
            [
                'name' => 'Hemorragia en el espacio subaracnoideo',
            ],
            [
                'name' => 'Hemorragia hipertensiva',
            ],
            [
                'name' => 'Hemorragia intraparenquimal',
            ],
            [
                'name' => 'Hemorragia subconjuntival',
            ],
            [
                'name' => 'Hepatitis isquémica',
            ],
            [
                'name' => 'Hifema',
            ],
            [
                'name' => 'Hipercolesterolemia familiar',
            ],
            [
                'name' => 'Hiperlipoproteinemia tipo I',
            ],
            [
                'name' => 'Hiperlipoproteinemia tipo II',
            ],
            [
                'name' => 'Hiperlipoproteinemia tipo III',
            ],
            [
                'name' => 'Hiperreflexia autónoma',
            ],
            [
                'name' => 'Hipertensión acelerada',
            ],
            [
                'name' => 'Hipertensión arterial pulmonar idiopática',
            ],
            [
                'name' => 'Hipertensión intracraneal benigna',
            ],
            [
                'name' => 'Hipertensión intracraneal idiopática',
            ],
            [
                'name' => 'Hipertensión pulmonar primaria',
            ],
            [
                'name' => 'Hipertensión pulmonar primaria esporádica',
            ],
            [
                'name' => 'Hipertensión pulmonar primaria familiar',
            ],
            [
                'name' => 'Hipertensión pulmonar secundaria',
            ],
            [
                'name' => 'Hipertensión renal',
            ],
            [
                'name' => 'Hipertensión renovascular',
            ],
            [
                'name' => 'Hipotensión mediada neuralmente',
            ],
            [
                'name' => 'Hipotensión ortostática neurológica',
            ],
            [
                'name' => 'Hipoxia cerebral',
            ],
            [
                'name' => 'HPP',
            ],
            [
                'name' => 'Infarto cerebral',
            ],
            [
                'name' => 'Infarto esplénico',
            ],
            [
                'name' => 'Infección necrosante de tejidos blandos',
            ],
            [
                'name' => 'Inflamación de pies',
            ],
            [
                'name' => 'Insuficiencia aórtica',
            ],
            [
                'name' => 'Insuficiencia arterial',
            ],
            [
                'name' => 'Insuficiencia venosa',
            ],
            [
                'name' => 'Insuficiencia venosa crónica',
            ],
            [
                'name' => 'Insuficiencia vertebrobasilar',
            ],
            [
                'name' => 'Isquemia de las arterias mesentéricas',
            ],
            [
                'name' => 'Isquemia del colon',
            ],
            [
                'name' => 'Isquemia e infarto intestinal',
            ],
            [
                'name' => 'Isquemia hepática',
            ],
            [
                'name' => 'Isquemia intestinal',
            ],
            [
                'name' => 'KTS',
            ],
            [
                'name' => 'Lesión renal',
            ],
            [
                'name' => 'Lesión renal aguda',
            ],
            [
                'name' => 'Lesión traumática del riñón',
            ],
            [
                'name' => 'Lesión ureteral',
            ],
            [
                'name' => 'Linfedema',
            ],
            [
                'name' => 'Livedo reticularis',
            ],
            [
                'name' => 'Livedo reticularis primaria o idiopática',
            ],
            [
                'name' => 'Malformaciones arteriovenosas',
            ],
            [
                'name' => 'MAV cerebral',
            ],
            [
                'name' => 'Mini derrame cerebral',
            ],
            [
                'name' => 'Mutación 20210A de la protrombina',
            ],
            [
                'name' => 'Mutación en el receptor de lipoproteína de baja densidad',
            ],
            [
                'name' => 'Necrosis intestinal',
            ],
            [
                'name' => 'Nevo verrugoso hipertrófico',
            ],
            [
                'name' => 'Oclusión de la arteria renal',
            ],
            [
                'name' => 'Oclusión de la arteria retiniana central',
            ],
            [
                'name' => 'Oclusión de la ramificación de la arteria retiniana',
            ],
            [
                'name' => 'Oclusión de la ramificación de la vena retiniana',
            ],
            [
                'name' => 'Oclusión de la vena retiniana central',
            ],
            [
                'name' => 'Oclusión de las arterias retinianas',
            ],
            [
                'name' => 'PAD',
            ],
            [
                'name' => 'Periarteritis nudosa',
            ],
            [
                'name' => 'Pie Diabético',
            ],
            [
                'name' => 'Presión arterial baja',
            ],
            [
                'name' => 'Presión sanguínea baja',
            ],
            [
                'name' => 'Prolapso de la válvula aórtica',
            ],
            [
                'name' => 'Prolapso de la válvula mitral',
            ],
            [
                'name' => 'PTT',
            ],
            [
                'name' => 'Púrpura trombocitopénica trombótica',
            ],
            [
                'name' => 'Quilomicronemia familiar',
            ],
            [
                'name' => 'Reacción de Eisenmenger',
            ],
            [
                'name' => 'Regurgitación aórtica',
            ],
            [
                'name' => 'Shock bacteriémico',
            ],
            [
                'name' => 'Shock del hígado',
            ],
            [
                'name' => 'Shock endotóxico',
            ],
            [
                'name' => 'Síndrome de Barlow',
            ],
            [
                'name' => 'Síndrome de Ehlers-Danlos',
            ],
            [
                'name' => 'Síndrome de Eisenmenger',
            ],
            [
                'name' => 'Síndrome de Klippel-Trenaunay',
            ],
            [
                'name' => 'Síndrome de Klippel-Trenaunay-Weber',
            ],
            [
                'name' => 'Síndrome de la abertura torácica superior',
            ],
            [
                'name' => 'Síndrome de Louis-Bar',
            ],
            [
                'name' => 'Síndrome de Nonne',
            ],
            [
                'name' => 'Síndrome de oclusión de la arteria carótida',
            ],
            [
                'name' => 'Síndrome de oclusión de la arteria subclavia',
            ],
            [
                'name' => 'Síndrome de oclusión de la arteria vertebrobasilar',
            ],
            [
                'name' => 'Síndrome de Osler-Weber-Rendu',
            ],
            [
                'name' => 'Sindrome de salida torácica',
            ],
            [
                'name' => 'Síndrome de Shy-McGee-Drager',
            ],
            [
                'name' => 'Síndrome del prolapso de la valva mitral',
            ],
            [
                'name' => 'Síndrome del robo de la subclavia',
            ],
            [
                'name' => 'Telangiectasia',
            ],
            [
                'name' => 'Telangiectasia hemorrágica hereditaria',
            ],
            [
                'name' => 'Toxemia',
            ],
            [
                'name' => 'Toxemia con convulsiones',
            ],
            [
                'name' => 'Tromboangeítis obliterante',
            ],
            [
                'name' => 'Trombocitemia esencial',
            ],
            [
                'name' => 'Trombocitemia primaria',
            ],
            [
                'name' => 'Tromboembolia',
            ],
            [
                'name' => 'Tromboembolia venosa',
            ],
            [
                'name' => 'Tromboflebitis',
            ],
            [
                'name' => 'Trombos',
            ],
            [
                'name' => 'Trombosis aguda de la arteria renal',
            ],
            [
                'name' => 'Trombosis de la vena renal',
            ],
            [
                'name' => 'Trombosis del seno cavernoso',
            ],
            [
                'name' => 'Trombosis venosa profunda',
            ],
            [
                'name' => 'Úlceras flevostáticas',
            ],
            [
                'name' => 'Úlceras linfáticas',
            ],
            [
                'name' => 'Úlceras por presión',
            ],
            [
                'name' => 'Válvula mitral floja',
            ],
            [
                'name' => 'Válvula mitral mixomatosa',
            ],
            [
                'name' => 'Varices',
            ],
            [
                'name' => 'Varicosidad',
            ],
            [
                'name' => 'Vasculitis de tipo necrosante',
            ],
            [
                'name' => 'Vasculitis leucocitoclástica cutánea',
            ],
            [
                'name' => 'Vasculitis sistémica',
            ],
            [
                'name' => 'Vasculopatía mesentérica',
            ],
            [
                'name' => 'Venas de araña',
            ],
            [
                'name' => 'Venas varicosas',
            ],
            [
                'name' => 'Vénulas',
            ],
            [
                'name' => 'Xantomatosis hipercolesterolémica',
            ],
            [
                'name' => 'Dislalia',
            ],
            [
                'name' => 'Enfermedad de Meniere',
            ],
            [
                'name' => 'Hiperacusia',
            ],
            [
                'name' => 'Laberíntitis',
            ],
            [
                'name' => 'Neuronitis vestibular',
            ],
            [
                'name' => 'Pérdida auditiva relacionada con la edad',
            ],
            [
                'name' => 'Procesamiento Central Auditivo',
            ],
            [
                'name' => 'Sordera',
            ],
            [
                'name' => 'Tartamudeo',
            ],
            [
                'name' => 'Trastorno del espectro autista (TEA)',
            ],
            [
                'name' => 'Trastornos de la deglución',
            ],
            [
                'name' => 'Trastornos de la voz',
            ],
            [
                'name' => 'Trastornos de lenguaje',
            ],
            [
                'name' => 'Trastornos del aprendizaje',
            ],
            [
                'name' => 'Trastornos del habla',
            ],
            [
                'name' => 'Vértigo Central',
            ],
            [
                'name' => 'Vértigo postural benigno',
            ],
            [
                'name' => 'Abuso del alcohol',
            ],
            [
                'name' => 'Accidente cardiovascular',
            ],
            [
                'name' => 'Accidente cerebrovascular cardioembólico',
            ],
            [
                'name' => 'Accidente cerebrovascular secundario a embolia cardiógena',
            ],
            [
                'name' => 'Accidente cerebrovascular secundario a fibrilación auricular',
            ],
            [
                'name' => 'AF',
            ],
            [
                'name' => 'Agenesia de la válvula pulmonar',
            ],
            [
                'name' => 'Síndrome de ALCAPA',
            ],
            [
                'name' => 'Amaurosis fugaz',
            ],
            [
                'name' => 'Amilidosis cardíaca primaria de tipo AL',
            ],
            [
                'name' => 'Amilidosis cardíaca secundaria de tipo AA',
            ],
            [
                'name' => 'Angina',
            ],
            [
                'name' => 'Angina acelerante',
            ],
            [
                'name' => 'Angina crónica',
            ],
            [
                'name' => 'Angina de aparición reciente',
            ],
            [
                'name' => 'Angina de Prinzmetal',
            ],
            [
                'name' => 'Angina estable',
            ],
            [
                'name' => 'Angina inestable',
            ],
            [
                'name' => 'Angina pectoral',
            ],
            [
                'name' => 'Angina progresiva',
            ],
            [
                'name' => 'Angina variante',
            ],
            [
                'name' => 'Anillo vascular',
            ],
            [
                'name' => 'Anomalía de Ebstein',
            ],
            [
                'name' => 'Anomalía de Taussig-Bing',
            ],
            [
                'name' => 'Anomalía del cayado aórtico',
            ],
            [
                'name' => 'Anomalías congénitas',
            ],
            [
                'name' => 'Arco aórtico derecho con subclavia y ligamento izquierdo anómalos',
            ],
            [
                'name' => 'Arco aórtico doble',
            ],
            [
                'name' => 'Arritmias',
            ],
            [
                'name' => 'Arteria coronaria izquierda anómala',
            ],
            [
                'name' => 'Arteriopatía coronaria (CAD)',
            ],
            [
                'name' => 'ASH',
            ],
            [
                'name' => 'Ataque cardíaco',
            ],
            [
                'name' => 'Atresia tricuspídea',
            ],
            [
                'name' => 'Ausencia congénita de la válvula pulmonar',
            ],
            [
                'name' => 'Ausencia de la válvula pulmonar',
            ],
            [
                'name' => 'AVSD',
            ],
            [
                'name' => 'Bradicardia',
            ],
            [
                'name' => 'Cardiomiopatía alcohólica',
            ],
            [
                'name' => 'Cardiomiopatía del periparto',
            ],
            [
                'name' => 'Cardiomiopatía dilatada',
            ],
            [
                'name' => 'Cardiomiopatía hipertrófica (CMH)',
            ],
            [
                'name' => 'Cardiomiopatía isquémica',
            ],
            [
                'name' => 'Cardiopatía cianótica',
            ],
            [
                'name' => 'Cardiopatía congénita',
            ],
            [
                'name' => 'Cardiopatía coronaria',
            ],
            [
                'name' => 'Cardiopatía hipertensiva',
            ],
            [
                'name' => 'Cardiopatías',
            ],
            [
                'name' => 'Cayado aórtico doble',
            ],
            [
                'name' => 'Complejo de Eisenmenger',
            ],
            [
                'name' => 'Comunicación auriculoventricular',
            ],
            [
                'name' => 'Comunicación interauricular',
            ],
            [
                'name' => 'Comunicación interauricular alta',
            ],
            [
                'name' => 'Comunicación interventricular',
            ],
            [
                'name' => 'Conducto arterial persistente',
            ],
            [
                'name' => 'Contracción ventricular prematura',
            ],
            [
                'name' => 'Contusión miocárdica',
            ],
            [
                'name' => 'Cor pulmonale',
            ],
            [
                'name' => 'CPV',
            ],
            [
                'name' => 'Defecto del canal auriculoventricular',
            ],
            [
                'name' => 'Defecto del relieve endocárdico',
            ],
            [
                'name' => 'Defecto del tabique aortopulmonar',
            ],
            [
                'name' => 'Defecto del tabique auricular (ASD)',
            ],
            [
                'name' => 'Defecto del tabique ventricular',
            ],
            [
                'name' => 'Defecto septal interventricular',
            ],
            [
                'name' => 'Derivación cardíaca de derecha a izquierda',
            ],
            [
                'name' => 'Derivación circulatoria de derecha a izquierda',
            ],
            [
                'name' => 'Dextrocardia',
            ],
            [
                'name' => 'Dextroposición',
            ],
            [
                'name' => 'Dextrorrotación',
            ],
            [
                'name' => 'Dextroversión',
            ],
            [
                'name' => 'DILV (ventrículo izquierdo con doble entrada)',
            ],
            [
                'name' => 'Disrritmias',
            ],
            [
                'name' => 'Doble entrada ventricular izquierda',
            ],
            [
                'name' => 'Doble salida ventricular derecha',
            ],
            [
                'name' => 'DORV',
            ],
            [
                'name' => 'DORV con comunicación interventricular doblemente comprometida',
            ],
            [
                'name' => 'DORV con comunicación interventricular no comprometida',
            ],
            [
                'name' => 'DORV con comunicación interventricular subaórtica',
            ],
            [
                'name' => 'Drenaje venoso pulmonar anómalo total',
            ],
            [
                'name' => 'Endocarditis',
            ],
            [
                'name' => 'Endocarditis de cultivo negativo',
            ],
            [
                'name' => 'Endocarditis infecciosa',
            ],
            [
                'name' => 'Enfermedad cardíaca arterioesclerótica',
            ],
            [
                'name' => 'Enfermedad cardíaca isquémica',
            ],
            [
                'name' => 'Enfermedad coronaria (CHD)',
            ],
            [
                'name' => 'Enfermedad de Eisenmenger',
            ],
            [
                'name' => 'Enfermedad sin pulso',
            ],
            [
                'name' => 'Espasmo de las arterias coronarias',
            ],
            [
                'name' => 'Estenosis aórtica',
            ],
            [
                'name' => 'Estenosis de la válvula aórtica',
            ],
            [
                'name' => 'Estenosis de la válvula pulmonar',
            ],
            [
                'name' => 'Estenosis mitral',
            ],
            [
                'name' => 'Estenosis subaórtica hipertrófica e idiopática',
            ],
            [
                'name' => 'Estenosis valvular pulmonar',
            ],
            [
                'name' => 'Extrasístole',
            ],
            [
                'name' => 'Fibrilación auricular',
            ],
            [
                'name' => 'Fibrilación ventricular',
            ],
            [
                'name' => 'Fibriloaleteo auricular',
            ],
            [
                'name' => 'Fiebre amarilla',
            ],
            [
                'name' => 'Fiebre reumática aguda',
            ],
            [
                'name' => 'FV',
            ],
            [
                'name' => 'HCM',
            ],
            [
                'name' => 'Hipertensión',
            ],
            [
                'name' => 'Hipertensión arterial en bebés',
            ],
            [
                'name' => 'Hipertensión inducida por fármacos',
            ],
            [
                'name' => 'Hipertensión pulmonar',
            ],
            [
                'name' => 'Hipotensión',
            ],
            [
                'name' => 'Hipotensión posprandial',
            ],
            [
                'name' => 'HMD',
            ],
            [
                'name' => 'HOCM',
            ],
            [
                'name' => 'IHSS',
            ],
            [
                'name' => 'Infarto agudo de miocardio',
            ],
            [
                'name' => 'Infarto de miocardio',
            ],
            [
                'name' => 'Infección de válvulas',
            ],
            [
                'name' => 'Infección por nocardia',
            ],
            [
                'name' => 'Inflamación del músculo cardíaco',
            ],
            [
                'name' => 'Insuficiencia cardíaca',
            ],
            [
                'name' => 'Insuficiencia cardíaca congestiva derecha (insuficiencia ventricular derecha)',
            ],
            [
                'name' => 'Insuficiencia cardíaca congestiva izquierda (insuficiencia ventricular izquierda)',
            ],
            [
                'name' => 'Insuficiencia mitral',
            ],
            [
                'name' => 'Insuficiencia mitral aguda',
            ],
            [
                'name' => 'Insuficiencia tricuspídea',
            ],
            [
                'name' => 'Intoxicación por digitálicos',
            ],
            [
                'name' => 'Intoxicación simpaticomimética',
            ],
            [
                'name' => 'Latido ventricular prematuro, PVB',
            ],
            [
                'name' => 'Latidos cardíacos ectópicos',
            ],
            [
                'name' => 'Latidos prematuros',
            ],
            [
                'name' => 'Leucomalacia periventricular',
            ],
            [
                'name' => 'Malformación de Ebstein',
            ],
            [
                'name' => 'Miocardiopatía alcohólica',
            ],
            [
                'name' => 'Miocardiopatía del periparto',
            ],
            [
                'name' => 'Miocardiopatía dilatada',
            ],
            [
                'name' => 'Miocardiopatía hipertrófica',
            ],
            [
                'name' => 'Miocardiopatía infiltrativa',
            ],
            [
                'name' => 'Miocardiopatía isquémica',
            ],
            [
                'name' => 'Miocardiopatía obstructiva hipertrófica',
            ],
            [
                'name' => 'Miocardiopatía restrictiva',
            ],
            [
                'name' => 'Miocardiopatías',
            ],
            [
                'name' => 'Miocarditis',
            ],
            [
                'name' => 'Miocarditis pediátrica',
            ],
            [
                'name' => 'Mixoma auricular',
            ],
            [
                'name' => 'Niveles elevados de colesterol y triglicéridos',
            ],
            [
                'name' => 'Nocardiosis',
            ],
            [
                'name' => 'Obstrucción de la válvula mitral',
            ],
            [
                'name' => 'Obstrucción de la vena cava superior',
            ],
            [
                'name' => 'Obstrucción de la vena hepática (Budd-Chiari)',
            ],
            [
                'name' => 'Obstrucción del conducto de salida ventricular izquierdo',
            ],
            [
                'name' => 'Oclusión en la vena renal',
            ],
            [
                'name' => 'Origen anómalo de la arteria coronaria izquierda que sale de la arteria pulmonar',
            ],
            [
                'name' => 'PA/IVS',
            ],
            [
                'name' => 'Pericarditis',
            ],
            [
                'name' => 'Pericarditis bacteriana',
            ],
            [
                'name' => 'Pericarditis constrictiva',
            ],
            [
                'name' => 'Pericarditis después de un ataque cardíaco',
            ],
            [
                'name' => 'Pericarditis por constricción cardíaca',
            ],
            [
                'name' => 'Pericarditis poscardiotomía',
            ],
            [
                'name' => 'Pericarditis purulenta',
            ],
            [
                'name' => 'Persistencia del agujero oval',
            ],
            [
                'name' => 'Presión arterial alta (Hipertensión)',
            ],
            [
                'name' => 'PVB',
            ],
            [
                'name' => 'PVC',
            ],
            [
                'name' => 'Regurgitación mitral aguda',
            ],
            [
                'name' => 'Regurgitación tricuspídea',
            ],
            [
                'name' => 'Retorno venoso pulmonar anómalo total (TAPVR)',
            ],
            [
                'name' => 'Ritmos cardíacos anormales',
            ],
            [
                'name' => 'SCIH',
            ],
            [
                'name' => 'Shock cardiógeno',
            ],
            [
                'name' => 'Shock hipovolémico',
            ],
            [
                'name' => 'Síncope',
            ],
            [
                'name' => 'Síndrome de Bland-White-Garland',
            ],
            [
                'name' => 'Síndrome de clic-soplo sistólico',
            ],
            [
                'name' => 'Síndrome de disfunción sinusal o disfunción del nódulo sinusal',
            ],
            [
                'name' => 'Síndrome de Dressler',
            ],
            [
                'name' => 'Síndrome de Hutchinson-Gilford',
            ],
            [
                'name' => 'Síndrome de la válvula pulmonar ausente',
            ],
            [
                'name' => 'Síndrome de la vena cava superior',
            ],
            [
                'name' => 'Síndrome de lesión cardíaca posterior',
            ],
            [
                'name' => 'Síndrome de Marfan',
            ],
            [
                'name' => 'Síndrome de Patau',
            ],
            [
                'name' => 'Síndrome de preexcitación',
            ],
            [
                'name' => 'Síndrome de transfusión entre gemelos',
            ],
            [
                'name' => 'Síndrome de transfusión fetal',
            ],
            [
                'name' => 'Síndrome de Wolff-Parkinson-White',
            ],
            [
                'name' => 'Síndrome del corazón izquierdo hipoplásico',
            ],
            [
                'name' => 'Síndrome del corazón rígido',
            ],
            [
                'name' => 'Síndrome del seno enfermo',
            ],
            [
                'name' => 'Soplo cardíaco',
            ],
            [
                'name' => 'Taponamiento',
            ],
            [
                'name' => 'Taponamiento cardíaco',
            ],
            [
                'name' => 'Taponamiento pericárdico',
            ],
            [
                'name' => 'Taquicardia',
            ],
            [
                'name' => 'Taquicardia auricular multifocal',
            ],
            [
                'name' => 'Taquicardia de complejo amplio',
            ],
            [
                'name' => 'Taquicardia supraventricular',
            ],
            [
                'name' => 'Taquicardia supraventricular paroxística (TSVP)',
            ],
            [
                'name' => 'Taquicardia ventricular',
            ],
            [
                'name' => 'TET',
            ],
            [
                'name' => 'Tetralogía de Fallot',
            ],
            [
                'name' => 'Transposición de las grandes arterias',
            ],
            [
                'name' => 'Transposición de los grandes vasos',
            ],
            [
                'name' => 'Trastornos cardiovasculares',
            ],
            [
                'name' => 'Tronco',
            ],
            [
                'name' => 'Tronco arterial',
            ],
            [
                'name' => 'TSVP',
            ],
            [
                'name' => 'Válvula aórtica bicomisural',
            ],
            [
                'name' => 'Válvula aórtica bicúspide',
            ],
            [
                'name' => 'Ventana aortopulmonar',
            ],
            [
                'name' => 'Ventrículo común',
            ],
            [
                'name' => 'Ventrículo único (corazón univentricular)',
            ],
            [
                'name' => 'WPW',
            ],
            [
                'name' => 'Accidente cerebrovascular secundario a la aterosclerosis',
            ],
            [
                'name' => 'Accidente cerebrovascular secundario a la estenosis de la carótida',
            ],
            [
                'name' => 'Atresia pulmonar',
            ],
            [
                'name' => 'Cáncer de pulmón de células no pequeñas',
            ],
            [
                'name' => 'Cáncer de pulmón de células pequeñas',
            ],
            [
                'name' => 'Cáncer metastásico al pulmón',
            ],
            [
                'name' => 'Carcinoma broncopulmonar',
            ],
            [
                'name' => 'Carcinoma microcítico de pulmón',
            ],
            [
                'name' => 'Carcinomas amicrocíticos de pulmón',
            ],
            [
                'name' => 'Carcinomas broncopulmonares no microcíticos',
            ],
            [
                'name' => 'Derrame pleural',
            ],
            [
                'name' => 'Empiema',
            ],
            [
                'name' => 'Enfisema mediastínico',
            ],
            [
                'name' => 'Estenosis traqueal',
            ],
            [
                'name' => 'Fibroma pleural',
            ],
            [
                'name' => 'Hemorragia intraventricular en neonatos',
            ],
            [
                'name' => 'Hemotórax',
            ],
            [
                'name' => 'Hiperhidrosis',
            ],
            [
                'name' => 'Líquido en el pulmón',
            ],
            [
                'name' => 'Líquido en el tórax',
            ],
            [
                'name' => 'Líquido pleural',
            ],
            [
                'name' => 'Malformaciones del tórax y esternón',
            ],
            [
                'name' => 'Mediastinitis',
            ],
            [
                'name' => 'Mesotelioma (benigno-fibroso)',
            ],
            [
                'name' => 'Mesotelioma benigno',
            ],
            [
                'name' => 'Mesotelioma fibroso',
            ],
            [
                'name' => 'Metástasis a los pulmones',
            ],
            [
                'name' => 'Mucosa traqueal desgarrada',
            ],
            [
                'name' => 'Neumomediastino',
            ],
            [
                'name' => 'Neumotórax',
            ],
            [
                'name' => 'Neumotórax a tensión',
            ],
            [
                'name' => 'Neumotórax espontáneo',
            ],
            [
                'name' => 'Neumotórax traumático',
            ],
            [
                'name' => 'Pleuritis',
            ],
            [
                'name' => 'Ruptura bronquial o traqueal',
            ],
            [
                'name' => 'Teratoma inmaduro',
            ],
            [
                'name' => 'Teratoma maligno',
            ],
            [
                'name' => 'Hemoptisis',
            ],
            [
                'name' => 'Traqueomalacia adquirida',
            ],
            [
                'name' => 'Tumor fibroso localizado de la pleura',
            ],
            [
                'name' => 'Tumor glómico yugular',
            ],
            [
                'name' => 'Tumor mediastinal',
            ],
            [
                'name' => 'Tumor productor de péptido intestinal vasoactivo',
            ],
            [
                'name' => 'Tumores cardíacos',
            ],
            [
                'name' => 'Hombro congelado',
            ],
            [
                'name' => 'Lesion de Plexo Braquial',
            ],
            [
                'name' => 'Lesión facial',
            ],
            [
                'name' => 'Luxación Acromioclavicular',
            ],
            [
                'name' => 'Mano Reumática',
            ],
            [
                'name' => 'Neuropatía del nervio radial',
            ],
            [
                'name' => 'Neuropatias Compresivas',
            ],
            [
                'name' => 'Síndrome de pinzamiento del hombro',
            ],
            [
                'name' => 'Adenoides agrandadas',
            ],
            [
                'name' => 'Apnea del sueño de tipo obstructivo',
            ],
            [
                'name' => 'Blefaroespasmo',
            ],
            [
                'name' => 'Celulitis',
            ],
            [
                'name' => 'Cicatriz hipertrófica',
            ],
            [
                'name' => 'Enfermedad benigna de las mamas',
            ],
            [
                'name' => 'Gigantomastia',
            ],
            [
                'name' => 'Hipertrofia del tabique asimétrico',
            ],
            [
                'name' => 'Infección aguda del oído',
            ],
            [
                'name' => 'Infección crónica de los senos paranasales',
            ],
            [
                'name' => 'Labio leporino y paladar hendido',
            ],
            [
                'name' => 'Melanoma',
            ],
            [
                'name' => 'Obstrucción del conducto lagrimal',
            ],
            [
                'name' => 'Oclusión dental defectuosa',
            ],
            [
                'name' => 'Otitis media crónica',
            ],
            [
                'name' => 'Polidactilia',
            ],
            [
                'name' => 'Prolapso uterino',
            ],
            [
                'name' => 'Rinofima',
            ],
            [
                'name' => 'Sindactilia',
            ],
            [
                'name' => 'Síndrome de Treacher-Collins',
            ],
            [
                'name' => 'Tumor nasal',
            ],
            [
                'name' => 'Abdomen agudo',
            ],
            [
                'name' => 'Absceso anal',
            ],
            [
                'name' => 'Absceso hepático bacteriano',
            ],
            [
                'name' => 'Absceso intraabdominal',
            ],
            [
                'name' => 'Absceso pancreático',
            ],
            [
                'name' => 'Acalasia',
            ],
            [
                'name' => 'Acalasia esofágica',
            ],
            [
                'name' => 'Acidez',
            ],
            [
                'name' => 'Adenoma de células insulares',
            ],
            [
                'name' => 'Adenoma de tiroides',
            ],
            [
                'name' => 'Adenoma hepático',
            ],
            [
                'name' => 'Adherencia intraperitoneal',
            ],
            [
                'name' => 'Adherencias',
            ],
            [
                'name' => 'Afecciones asociadas con la ictericia',
            ],
            [
                'name' => 'Almorranas',
            ],
            [
                'name' => 'Amebiasis extraintestinal',
            ],
            [
                'name' => 'Amebiasis hepática',
            ],
            [
                'name' => 'Anemia por deficiencia de vitamina B12',
            ],
            [
                'name' => 'Angiodisplasia del colon',
            ],
            [
                'name' => 'Anillo de Schatzki',
            ],
            [
                'name' => 'Anillo esofágico inferior',
            ],
            [
                'name' => 'Anillo esofagogástrico',
            ],
            [
                'name' => 'Ano imperforado',
            ],
            [
                'name' => 'Apendicitis',
            ],
            [
                'name' => 'Atresia anal',
            ],
            [
                'name' => 'Atresia duodenal',
            ],
            [
                'name' => 'Atresia esofágica',
            ],
            [
                'name' => 'Bocio',
            ],
            [
                'name' => 'Bocio multinodular tóxico',
            ],
            [
                'name' => 'Cálculo en el conducto biliar',
            ],
            [
                'name' => 'Cálculos biliares',
            ],
            [
                'name' => 'Cálculos vesicales',
            ],
            [
                'name' => 'Cambios precancerosos del cuello uterino',
            ],
            [
                'name' => 'Cáncer de esófago',
            ],
            [
                'name' => 'Cáncer de mama',
            ],
            [
                'name' => 'Cáncer de paratiroides',
            ],
            [
                'name' => 'Cáncer de tiroides',
            ],
            [
                'name' => 'Cáncer de vejiga',
            ],
            [
                'name' => 'Cáncer del colon',
            ],
            [
                'name' => 'Cáncer del estómago',
            ],
            [
                'name' => 'Cáncer del páncreas',
            ],
            [
                'name' => 'Cáncer laríngeo',
            ],
            [
                'name' => 'Cáncer renal',
            ],
            [
                'name' => 'Carcinoma corticosuprarrenal',
            ],
            [
                'name' => 'Carcinoma ductal o canalicular',
            ],
            [
                'name' => 'Carcinoma hepatocelular',
            ],
            [
                'name' => 'Carcinoma medular de tiroides',
            ],
            [
                'name' => 'Carcinoma papilar de la tiroides',
            ],
            [
                'name' => 'Carcinoma primario de las células del hígado',
            ],
            [
                'name' => 'Celulitis estreptocócica perianal',
            ],
            [
                'name' => 'Colangitis',
            ],
            [
                'name' => 'Colangitis esclerosante',
            ],
            [
                'name' => 'Colecistitis aguda',
            ],
            [
                'name' => 'Colecistitis crónica',
            ],
            [
                'name' => 'Colecistopatía',
            ],
            [
                'name' => 'Coledocolitiasis',
            ],
            [
                'name' => 'Colelitiasis',
            ],
            [
                'name' => 'Colestasis extrahepática',
            ],
            [
                'name' => 'Colitis',
            ],
            [
                'name' => 'Colitis isquémica',
            ],
            [
                'name' => 'Colitis necrosante',
            ],
            [
                'name' => 'Colon irritable',
            ],
            [
                'name' => 'Colon redundante',
            ],
            [
                'name' => 'Congestión mamaria',
            ],
            [
                'name' => 'Criptorquidia',
            ],
            [
                'name' => 'Dedos en garra',
            ],
            [
                'name' => 'Desgarro de Mallory-Weiss',
            ],
            [
                'name' => 'Diástasis de rectos',
            ],
            [
                'name' => 'Dilatación tóxica del colon',
            ],
            [
                'name' => 'Diverticulitis',
            ],
            [
                'name' => 'Divertículo de Meckel',
            ],
            [
                'name' => 'ECN',
            ],
            [
                'name' => 'Ectasia vascular del colon',
            ],
            [
                'name' => 'Embarazo cervical',
            ],
            [
                'name' => 'Embolia cerebral',
            ],
            [
                'name' => 'Enfermedad de Crohn',
            ],
            [
                'name' => 'Enfermedad de Hirschsprung',
            ],
            [
                'name' => 'Enterocolitis necrosante',
            ],
            [
                'name' => 'Enfermedad de la vesícula biliar',
            ],
            [
                'name' => 'Enfermedad del quiste hidatídico',
            ],
            [
                'name' => 'Enfermedad inflamatoria intestinal',
            ],
            [
                'name' => 'Enteritis regional',
            ],
            [
                'name' => 'Esofagitis',
            ],
            [
                'name' => 'Esofagitis péptica',
            ],
            [
                'name' => 'Esofagitis por reflujo',
            ],
            [
                'name' => 'Esplenectomía - síndrome posoperatorio',
            ],
            [
                'name' => 'Espolón calcáneo',
            ],
            [
                'name' => 'Estenosis biliar',
            ],
            [
                'name' => 'Estenosis esofágica benigna',
            ],
            [
                'name' => 'Estenosis pilórica',
            ],
            [
                'name' => 'Exostosis',
            ],
            [
                'name' => 'Fascitis necrosante',
            ],
            [
                'name' => 'Fascitis plantar',
            ],
            [
                'name' => 'Feocromocitoma',
            ],
            [
                'name' => 'Fibroadenoma de mama',
            ],
            [
                'name' => 'Fístula gastrointestinal',
            ],
            [
                'name' => 'Fístula gastroyeyunocólica',
            ],
            [
                'name' => 'Fístula traqueoesofágica',
            ],
            [
                'name' => 'Fisura anal',
            ],
            [
                'name' => 'Gastritis',
            ],
            [
                'name' => 'Gastritis crónica',
            ],
            [
                'name' => 'Gastroenteritis bacteriana con diarrea infecciosa',
            ],
            [
                'name' => 'Gastroparesia del diabético',
            ],
            [
                'name' => 'GERD',
            ],
            [
                'name' => 'Glucagonoma',
            ],
            [
                'name' => 'Glucogenosis tipo I',
            ],
            [
                'name' => 'Goma',
            ],
            [
                'name' => 'Granuloma inguinal',
            ],
            [
                'name' => 'Hemangioma cavernoso',
            ],
            [
                'name' => 'Hematocele',
            ],
            [
                'name' => 'Hemorroides',
            ],
            [
                'name' => 'Hernia',
            ],
            [
                'name' => 'Hernia crural',
            ],
            [
                'name' => 'Hernia diafragmática',
            ],
            [
                'name' => 'Hernia inguinal',
            ],
            [
                'name' => 'Hernia umbilical',
            ],
            [
                'name' => 'Hernia hiatal',
            ],
            [
                'name' => 'Hidrocele de la túnica vaginal del testículo (proceso vaginal)',
            ],
            [
                'name' => 'Hiperparatiroidismo',
            ],
            [
                'name' => 'Hiperparatiroidismo primario',
            ],
            [
                'name' => 'Hiperparatiroidismo secundario',
            ],
            [
                'name' => 'Hiperplasia paratiroidea',
            ],
            [
                'name' => 'Hipertrofia (hiperplasia) prostática benigna',
            ],
            [
                'name' => 'Hiponatremia hipervolémica',
            ],
            [
                'name' => 'HPB',
            ],
            [
                'name' => 'Ileítis',
            ],
            [
                'name' => 'Íleo',
            ],
            [
                'name' => 'Íleo colónico agudo',
            ],
            [
                'name' => 'Íleo del colon',
            ],
            [
                'name' => 'Íleo paralítico',
            ],
            [
                'name' => 'Ileocolitis granulomatosa',
            ],
            [
                'name' => 'Incontinencia fecal',
            ],
            [
                'name' => 'Insulinoma',
            ],
            [
                'name' => 'Insuloma',
            ],
            [
                'name' => 'Intestino muerto',
            ],
            [
                'name' => 'Juanetes',
            ],
            [
                'name' => 'Lipoma cervical',
            ],
            [
                'name' => 'Malformación anorrectal',
            ],
            [
                'name' => 'Mastalgia',
            ],
            [
                'name' => 'Mastitis',
            ],
            [
                'name' => 'Megacolon tóxico',
            ],
            [
                'name' => 'Megarrecto',
            ],
            [
                'name' => 'MTC',
            ],
            [
                'name' => 'Neoplasia endocrina múltiple (NEM) I',
            ],
            [
                'name' => 'Neoplasia endocrina múltiple (NEM) II',
            ],
            [
                'name' => 'Nódulo tiroideo',
            ],
            [
                'name' => 'Obesidad mórbida',
            ],
            [
                'name' => 'Obstrucción aguda de las vías aéreas superiores',
            ],
            [
                'name' => 'Obstrucción del orificio gástrico',
            ],
            [
                'name' => 'Obstrucción intestinal',
            ],
            [
                'name' => 'Onicocriptosis',
            ],
            [
                'name' => 'Onicomicosis',
            ],
            [
                'name' => 'Otospongiosis',
            ],
            [
                'name' => 'Páncreas anular',
            ],
            [
                'name' => 'Páncreas divisum',
            ],
            [
                'name' => 'Pancreatitis',
            ],
            [
                'name' => 'Pancreatitis aguda',
            ],
            [
                'name' => 'Paraganglionoma',
            ],
            [
                'name' => 'Perforación gastrointestinal',
            ],
            [
                'name' => 'Peritonitis',
            ],
            [
                'name' => 'Peritonitis asociada con diálisis',
            ],
            [
                'name' => 'Peritonitis bacteriana espontánea (PBE)',
            ],
            [
                'name' => 'Peritonitis de tipo secundario',
            ],
            [
                'name' => 'Peritonitis espontánea',
            ],
            [
                'name' => 'Pólipos colorrectales',
            ],
            [
                'name' => 'Pólipos intestinales',
            ],
            [
                'name' => 'Problemas del pezón',
            ],
            [
                'name' => 'Proceso vaginal persistente',
            ],
            [
                'name' => 'Prolapso rectal',
            ],
            [
                'name' => 'Quiste epidermoide',
            ],
            [
                'name' => 'Quiste mucoso',
            ],
            [
                'name' => 'Quiste pilonidal',
            ],
            [
                'name' => 'Quiste queratínico',
            ],
            [
                'name' => 'Quiste sebáceo',
            ],
            [
                'name' => 'Quistes vaginales',
            ],
            [
                'name' => 'Reflujo gastroesofágico',
            ],
            [
                'name' => 'Sarcoma del tejido blando',
            ],
            [
                'name' => 'Seudoobstrucción colónica',
            ],
            [
                'name' => 'Seudoobstrucción intestinal crónica',
            ],
            [
                'name' => 'Seudoobstrucción intestinal',
            ],
            [
                'name' => 'Seudoobstrucción intestinal idiopática',
            ],
            [
                'name' => 'Seudoobstrucción intestinal primaria',
            ],
            [
                'name' => 'Síndrome compartimental',
            ],
            [
                'name' => 'Síndrome de Barrett',
            ],
            [
                'name' => 'Síndrome de Ogilvie',
            ],
            [
                'name' => 'Síndrome de Paterson-Kelly',
            ],
            [
                'name' => 'Síndrome de Peutz-Jeghers',
            ],
            [
                'name' => 'Síndrome de Sipple',
            ],
            [
                'name' => 'Síndrome de Stein-Leventhal',
            ],
            [
                'name' => 'Síndrome de Wermer',
            ],
            [
                'name' => 'Síndrome del colon irritable (IBS)',
            ],
            [
                'name' => 'SPJ',
            ],
            [
                'name' => 'Tiroides retroesternal',
            ],
            [
                'name' => 'Trombosis venosa mesentérica',
            ],
            [
                'name' => 'Tumor de los islotes de Langerhans',
            ],
            [
                'name' => 'Tumor del hígado',
            ],
            [
                'name' => 'Tumor del hueso temporal',
            ],
            [
                'name' => 'Tumor endocrino pancreático',
            ],
            [
                'name' => 'Tumor medular',
            ],
            [
                'name' => 'Tumor suprarrenal',
            ],
            [
                'name' => 'Tumor tiroideo',
            ],
            [
                'name' => 'Tumor trofoblástico',
            ],
            [
                'name' => 'Tumores o protuberancias en las mamas',
            ],
            [
                'name' => 'Úlcera duodenal',
            ],
            [
                'name' => 'Úlcera gastroduodenal aguda',
            ],
            [
                'name' => 'Úlcera péptica',
            ],
            [
                'name' => 'Úlceras venosas',
            ],
            [
                'name' => 'Uña del pie encarnada',
            ],
            [
                'name' => 'Ureterocele',
            ],
            [
                'name' => 'Vaciamiento gástrico retardado',
            ],
            [
                'name' => 'Verrugas plantares',
            ],
            [
                'name' => 'Vibrio',
            ],
            [
                'name' => 'Vipoma',
            ],
            [
                'name' => 'Vómito persistente',
            ],
            [
                'name' => 'Absceso del espacio faringomaxilar',
            ],
            [
                'name' => 'Absceso periamigdalino',
            ],
            [
                'name' => 'Absceso retrofaríngeo',
            ],
            [
                'name' => 'Actinomicosis',
            ],
            [
                'name' => 'Angina de Ludwig',
            ],
            [
                'name' => 'Anquiloglosia',
            ],
            [
                'name' => 'Bruxismo',
            ],
            [
                'name' => 'Cáncer de piel en célula basal',
            ],
            [
                'name' => 'Cáncer oral',
            ],
            [
                'name' => 'Carcinoma anaplásico de tiroides',
            ],
            [
                'name' => 'Carcinoma bucal de células escamosas',
            ],
            [
                'name' => 'Carcinoma paratiroideo',
            ],
            [
                'name' => 'Carcinoma posterior de la lengua',
            ],
            [
                'name' => 'Caries',
            ],
            [
                'name' => 'Cigomicosis',
            ],
            [
                'name' => 'Cortedad anormal del frenillo lingual',
            ],
            [
                'name' => 'Diente retenido',
            ],
            [
                'name' => 'Disoclusión de los dientes',
            ],
            [
                'name' => 'Disostosis cleidocraneal',
            ],
            [
                'name' => 'Disostosis mandibulofacial',
            ],
            [
                'name' => 'Enfermedad periodontal - piorrea',
            ],
            [
                'name' => 'Estomatitis gangrenosa',
            ],
            [
                'name' => 'Glositis benigna migratoria',
            ],
            [
                'name' => 'Impactación dental',
            ],
            [
                'name' => 'Infección de los senos paranasales',
            ],
            [
                'name' => 'Infección dental',
            ],
            [
                'name' => 'Infecciones de la glándula salival',
            ],
            [
                'name' => 'Lesión maxilofacial',
            ],
            [
                'name' => 'Lesiones de Lefort',
            ],
            [
                'name' => 'Llagas orales (cáncrum oris)',
            ],
            [
                'name' => 'Mordida abierta',
            ],
            [
                'name' => 'Mucocele',
            ],
            [
                'name' => 'Muelas del juicio',
            ],
            [
                'name' => 'Nariz bulbosa',
            ],
            [
                'name' => 'Noma',
            ],
            [
                'name' => 'Parálisis del nervio facial',
            ],
            [
                'name' => 'Periodontitis',
            ],
            [
                'name' => 'Prognatismo',
            ],
            [
                'name' => 'Quiste de retención mucosa',
            ],
            [
                'name' => 'Secuencia de Robin',
            ],
            [
                'name' => 'Seno o fístula de la hendidura branquial',
            ],
            [
                'name' => 'Síndrome de Apert',
            ],
            [
                'name' => 'Síndrome de Pierre Robin',
            ],
            [
                'name' => 'Sobremordida',
            ],
            [
                'name' => 'Submordida',
            ],
            [
                'name' => 'TMD',
            ],
            [
                'name' => 'Trastornos de la articulación temporomandibular',
            ],
            [
                'name' => 'Trastornos de la ATM',
            ],
            [
                'name' => 'Trastornos de las glándulas salivales',
            ],
            [
                'name' => 'Traumatismo facial',
            ],
            [
                'name' => 'Tumor de la glándula lagrimal',
            ],
            [
                'name' => 'Cáncer de endometrio',
            ],
            [
                'name' => 'Cáncer de los ovarios',
            ],
            [
                'name' => 'Cáncer de piel',
            ],
            [
                'name' => 'Cáncer de testículos',
            ],
            [
                'name' => 'Cáncer del cuello uterino',
            ],
            [
                'name' => 'Cáncer tiroideo (carcinoma medular)',
            ],
            [
                'name' => 'Quistes ováricos',
            ],
            [
                'name' => 'Craneosinostosis',
            ],
            [
                'name' => 'DDH',
            ],
            [
                'name' => 'Dedo supernumerario',
            ],
            [
                'name' => 'Fibroplasia retrolenticular o retrocristaliniana',
            ],
            [
                'name' => 'Fístula pre-auricular',
            ],
            [
                'name' => 'Gastrosquisis',
            ],
            [
                'name' => 'Hidrocele',
            ],
            [
                'name' => 'Higroma quístico',
            ],
            [
                'name' => 'Hipospadias',
            ],
            [
                'name' => 'Isquemia testicular',
            ],
            [
                'name' => 'Megacolon congénito',
            ],
            [
                'name' => 'Onfalocele',
            ],
            [
                'name' => 'Pseudo-ainhum',
            ],
            [
                'name' => 'Quiste branquiógeno',
            ],
            [
                'name' => 'Reflujo vesicoureteral',
            ],
            [
                'name' => 'Retinopatía de la prematuridad',
            ],
            [
                'name' => 'ROP',
            ],
            [
                'name' => 'Secuencia de bandas amnióticas',
            ],
            [
                'name' => 'Sindrome de Eagle-Barrett',
            ],
            [
                'name' => 'Síndrome del abdomen en ciruela pasa',
            ],
            [
                'name' => 'Tumor de Wilms',
            ],
            [
                'name' => 'Tumor del ángulo',
            ],
            [
                'name' => 'Absceso subcutáneo',
            ],
            [
                'name' => 'Acné quístico',
            ],
            [
                'name' => 'Cáncer de piel escamocelular',
            ],
            [
                'name' => 'Cicatriz queloide',
            ],
            [
                'name' => 'Contractura de Dupuytren',
            ],
            [
                'name' => 'Displasia de Streeter',
            ],
            [
                'name' => 'Feminización testicular',
            ],
            [
                'name' => 'Inflamación de las encías con compromiso del hueso',
            ],
            [
                'name' => 'Lunar',
            ],
            [
                'name' => 'Masas cutáneas de grasa',
            ],
            [
                'name' => 'Microtia',
            ],
            [
                'name' => 'Necrosis avascular',
            ],
            [
                'name' => 'Quemaduras',
            ],
            [
                'name' => 'Quiste poplíteo',
            ],
            [
                'name' => 'Seudohermafroditismo',
            ],
            [
                'name' => 'Seudohermafroditismo masculino incompleto',
            ],
            [
                'name' => 'Síndrome de insensibilidad a los andrógenos',
            ],
            [
                'name' => 'Síndrome de insensibilidad parcial a los andrógenos',
            ],
            [
                'name' => 'Talipes',
            ],
            [
                'name' => 'Transexualismo',
            ],
            [
                'name' => 'Xantelasma',
            ],
            [
                'name' => 'Absceso',
            ],
            [
                'name' => 'Absceso de la piel',
            ],
            [
                'name' => 'Acantosis pigmentaria',
            ],
            [
                'name' => 'Acné',
            ],
            [
                'name' => 'Acné rosácea',
            ],
            [
                'name' => 'Acné vulgar',
            ],
            [
                'name' => 'Acrocordones',
            ],
            [
                'name' => 'Acrodermatitis',
            ],
            [
                'name' => 'Acrodermatitis liquenoide infantil',
            ],
            [
                'name' => 'Acrodermatitis papular de la niñez',
            ],
            [
                'name' => 'Adenoma sebáceo',
            ],
            [
                'name' => 'Adrenoleucodistrofia cerebral infantil',
            ],
            [
                'name' => 'Aftas',
            ],
            [
                'name' => 'Albinismo',
            ],
            [
                'name' => 'Albinismo oculocutáneo',
            ],
            [
                'name' => 'Alopecia androgénica',
            ],
            [
                'name' => 'Alopecia areata',
            ],
            [
                'name' => 'Alopecia en hombres',
            ],
            [
                'name' => 'Alopecia universal',
            ],
            [
                'name' => 'Ancylostoma braziliense',
            ],
            [
                'name' => 'Angioma aracniforme',
            ],
            [
                'name' => 'Angioma en cereza',
            ],
            [
                'name' => 'Angiomatosis encefalotrigeminal',
            ],
            [
                'name' => 'Angioosteohipertrofia',
            ],
            [
                'name' => 'Artritis psoriásica',
            ],
            [
                'name' => 'Ataxia-telangiectasia',
            ],
            [
                'name' => 'Barros',
            ],
            [
                'name' => 'Blastomicosis norteamericana',
            ],
            [
                'name' => 'Bromhidrosis (mal olor corporal)',
            ],
            [
                'name' => 'Cacosmia',
            ],
            [
                'name' => 'Calvicie de patrón femenino',
            ],
            [
                'name' => 'Calvicie de patrón masculino',
            ],
            [
                'name' => 'Cambios en la piel inducidos por el sol',
            ],
            [
                'name' => 'Cambios queratósicos en la piel inducidos por el sol',
            ],
            [
                'name' => 'Cáncer de células escamosas de la piel',
            ],
            [
                'name' => 'Candidiasis cutánea',
            ],
            [
                'name' => 'Candidiasis intertriginosa',
            ],
            [
                'name' => 'Carbunco cutáneo',
            ],
            [
                'name' => 'Carcinoma escamocelular de la piel',
            ],
            [
                'name' => 'Caspa',
            ],
            [
                'name' => 'Cercariosis cutánea',
            ],
            [
                'name' => 'Cicatrices de acné',
            ],
            [
                'name' => 'Cloasma',
            ],
            [
                'name' => 'Condiloma acuminado',
            ],
            [
                'name' => 'Costra láctea',
            ],
            [
                'name' => 'Dermatitis asteatótica (eccema craquelé)',
            ],
            [
                'name' => 'Dermatitis Cenicienta',
            ],
            [
                'name' => 'Dermatitis exfoliativa',
            ],
            [
                'name' => 'Dermatitis herpetiforme',
            ],
            [
                'name' => 'Dermatitis numular',
            ],
            [
                'name' => 'Dermatitis perioral',
            ],
            [
                'name' => 'Dermatitis seborreica',
            ],
            [
                'name' => 'Dermatitis y úlceras por estasis',
            ],
            [
                'name' => 'Dermatofítide',
            ],
            [
                'name' => 'Dermatofitosis de la ingle',
            ],
            [
                'name' => 'Dermatofitosis del pie',
            ],
            [
                'name' => 'Dermatomiositis',
            ],
            [
                'name' => 'Dermatosis (sistémica)',
            ],
            [
                'name' => 'Dishidrosis',
            ],
            [
                'name' => 'Displasia ectodérmica',
            ],
            [
                'name' => 'Displasia ectodérmica anhidrótica',
            ],
            [
                'name' => 'Diviesos',
            ],
            [
                'name' => 'Eccema',
            ],
            [
                'name' => 'Eccema asteatótico',
            ],
            [
                'name' => 'Eccema dishidrótico',
            ],
            [
                'name' => 'Eccema infantil',
            ],
            [
                'name' => 'Eccema numular',
            ],
            [
                'name' => 'Eccema seborreico',
            ],
            [
                'name' => 'Ectima',
            ],
            [
                'name' => 'Enfermedad de Addison',
            ],
            [
                'name' => 'Enfermedad de Duhring',
            ],
            [
                'name' => 'Enfermedad de Ritter',
            ],
            [
                'name' => 'Enfermedad del cabello ensortijado',
            ],
            [
                'name' => 'Epidermólisis ampollar',
            ],
            [
                'name' => 'Epidermólisis ampollar de unión',
            ],
            [
                'name' => 'Epidermólisis bullosa',
            ],
            [
                'name' => 'Epidermólisis bulosa distrófica',
            ],
            [
                'name' => 'Epidermólisis bulosa hemidesmosomal',
            ],
            [
                'name' => 'Equimosis',
            ],
            [
                'name' => 'Erisipela',
            ],
            [
                'name' => 'Eritema nodoso',
            ],
            [
                'name' => 'Eritema tóxico del neonato',
            ],
            [
                'name' => 'Eritrasma',
            ],
            [
                'name' => 'Eritrodermia',
            ],
            [
                'name' => 'Erupción serpiginosa',
            ],
            [
                'name' => 'Esclerodermia',
            ],
            [
                'name' => 'Escleroma',
            ],
            [
                'name' => 'Esclerosis tuberosa',
            ],
            [
                'name' => 'Esporotricosis',
            ],
            [
                'name' => 'Esquistosoma',
            ],
            [
                'name' => 'Esquistosomiasis',
            ],
            [
                'name' => 'Esquistosomosis',
            ],
            [
                'name' => 'Estomatitis herpética',
            ],
            [
                'name' => 'Estrés',
            ],
            [
                'name' => 'Fascitis eosinofílica',
            ],
            [
                'name' => 'Fiebre de Katayama',
            ],
            [
                'name' => 'Fiebre de montaña',
            ],
            [
                'name' => 'Fiebre de O´nyon-nyong',
            ],
            [
                'name' => 'Fiebre del dengue hemorrágico',
            ],
            [
                'name' => 'Fiebre del valle del río Ohio',
            ],
            [
                'name' => 'Fiebre entérica',
            ],
            [
                'name' => 'Fiebre hemorrágica de Filipinas',
            ],
            [
                'name' => 'Fiebre hemorrágica de Singapur',
            ],
            [
                'name' => 'Fiebre hemorrágica tailandesa',
            ],
            [
                'name' => 'Fiebre maculosa de las Montañas Rocosas',
            ],
            [
                'name' => 'Fiebre periódica',
            ],
            [
                'name' => 'Fiebre por dengue hemorrágico',
            ],
            [
                'name' => 'Fiebre quebrantahuesos',
            ],
            [
                'name' => 'Foliculitis',
            ],
            [
                'name' => 'Foliculitis de la tina',
            ],
            [
                'name' => 'Forúnculo',
            ],
            [
                'name' => 'Fotosensibilidad',
            ],
            [
                'name' => 'Gastrinoma',
            ],
            [
                'name' => 'Glositis',
            ],
            [
                'name' => 'Golondrino',
            ],
            [
                'name' => 'Gonococemia diseminada',
            ],
            [
                'name' => 'Granos',
            ],
            [
                'name' => 'Granuloma anular',
            ],
            [
                'name' => 'Granuloma de las piscinas',
            ],
            [
                'name' => 'Granuloma eosinofílico',
            ],
            [
                'name' => 'Granuloma necrosante',
            ],
            [
                'name' => 'Granuloma piógeno',
            ],
            [
                'name' => 'Granulomatosis mortal de la infancia',
            ],
            [
                'name' => 'Granulomatosis pulmonar de las células de Langerhans',
            ],
            [
                'name' => 'Granulomatosis séptica progresiva',
            ],
            [
                'name' => 'Hemangioma capilar lobular',
            ],
            [
                'name' => 'Hemangioma fresa',
            ],
            [
                'name' => 'Hemangioma plano',
            ],
            [
                'name' => 'Hemangioma simple',
            ],
            [
                'name' => 'Herpes adquirido al nacer',
            ],
            [
                'name' => 'Herpes labial',
            ],
            [
                'name' => 'Herpes zóster (culebrilla)',
            ],
            [
                'name' => 'Hidradenitis supurativa',
            ],
            [
                'name' => 'Hiedra venenosa',
            ],
            [
                'name' => 'Hipertricosis',
            ],
            [
                'name' => 'Hipofunción corticosuprarrenal',
            ],
            [
                'name' => 'Hipofunción ovárica',
            ],
            [
                'name' => 'Hipoglucemia inducida por fármacos',
            ],
            [
                'name' => 'Hipogonadismo hipogonadotrópico',
            ],
            [
                'name' => 'Hipomelanosis de Ito',
            ],
            [
                'name' => 'Hipopituitarismo puerperal',
            ],
            [
                'name' => 'Histoplasmosis',
            ],
            [
                'name' => 'Histoplasmosis cavitaria crónica',
            ],
            [
                'name' => 'Histoplasmosis diseminada',
            ],
            [
                'name' => 'Histoplasmosis pulmonar aguda (primaria)',
            ],
            [
                'name' => 'Histoplasmosis pulmonar crónica',
            ],
            [
                'name' => 'Histoplasmosis sistémica',
            ],
            [
                'name' => 'HSV',
            ],
            [
                'name' => 'Ictiosis común',
            ],
            [
                'name' => 'Ictiosis laminar',
            ],
            [
                'name' => 'Impétigo',
            ],
            [
                'name' => 'Incontinencia pigmentaria',
            ],
            [
                'name' => 'Incontinencia pigmentaria acrómica',
            ],
            [
                'name' => 'Induración',
            ],
            [
                'name' => 'Infección de la ingle por hongos',
            ],
            [
                'name' => 'Infección de la piel por hongos levaduriformes',
            ],
            [
                'name' => 'Infección de Lyme temprana y localizada',
            ],
            [
                'name' => 'Infección de piel por estafilococo',
            ],
            [
                'name' => 'Infección de un folículo piloso',
            ],
            [
                'name' => 'Infección del cuero cabelludo',
            ],
            [
                'name' => 'Infección del pie por hongos',
            ],
            [
                'name' => 'Infección en el cuero cabelludo por hongos',
            ],
            [
                'name' => 'Infección estafilocócica de piel',
            ],
            [
                'name' => 'Infección gonocócica diseminada (IGD)',
            ],
            [
                'name' => 'Infección micótica de la uña',
            ],
            [
                'name' => 'Infección micótica de piel',
            ],
            [
                'name' => 'Infección micótica del cuero cabelludo',
            ],
            [
                'name' => 'Infección tisular por clostridio',
            ],
            [
                'name' => 'Insuficiencia hipofisaria después del parto',
            ],
            [
                'name' => 'Insuficiencia ovárica prematura',
            ],
            [
                'name' => 'Kala-azar',
            ],
            [
                'name' => 'Larva migratoria',
            ],
            [
                'name' => 'Larva migratoria cutánea',
            ],
            [
                'name' => 'Leishmaniasis',
            ],
            [
                'name' => 'Lengua geográfica',
            ],
            [
                'name' => 'Léntigos solares o seniles',
            ],
            [
                'name' => 'Lepra',
            ],
            [
                'name' => 'Leptospirosis',
            ],
            [
                'name' => 'Lesión cutánea de blastomicosis',
            ],
            [
                'name' => 'Lesión cutánea de coccidioidomicosis',
            ],
            [
                'name' => 'Lesión cutánea de histoplasmosis',
            ],
            [
                'name' => 'Lesión de la médula espinal',
            ],
            [
                'name' => 'Linfangitis',
            ],
            [
                'name' => 'Liquen plano',
            ],
            [
                'name' => 'Liquen simple crónico',
            ],
            [
                'name' => 'Manchas de color café con leche',
            ],
            [
                'name' => 'Manchas de grasa',
            ],
            [
                'name' => 'Manchas de la edad',
            ],
            [
                'name' => 'Mandíbula hinchada o abultada',
            ],
            [
                'name' => 'Marca de la cigüeña',
            ],
            [
                'name' => 'Marcas de nacimiento pigmentadas',
            ],
            [
                'name' => 'Marcas de nacimiento rojas',
            ],
            [
                'name' => 'Marcas en la piel',
            ],
            [
                'name' => 'Masas escrotales',
            ],
            [
                'name' => 'Mastocitoma',
            ],
            [
                'name' => 'Mastocitosis',
            ],
            [
                'name' => 'Melanocitosis dérmica',
            ],
            [
                'name' => 'Melanocitosis dérmica congénita',
            ],
            [
                'name' => 'Melanoma del ojo',
            ],
            [
                'name' => 'Melanoma maligno de la coroides',
            ],
            [
                'name' => 'Melanoma metastásico',
            ],
            [
                'name' => 'Melanosis por fricción',
            ],
            [
                'name' => 'Melasma',
            ],
            [
                'name' => 'Micetoma',
            ],
            [
                'name' => 'Micosis',
            ],
            [
                'name' => 'Milios',
            ],
            [
                'name' => 'Mionecrosis',
            ],
            [
                'name' => 'Molusco contagioso',
            ],
            [
                'name' => 'Neurofibromatosis 2',
            ],
            [
                'name' => 'Neurofibromatosis de von Recklinghausen',
            ],
            [
                'name' => 'Neurofibromatosis-1',
            ],
            [
                'name' => 'Nevo en calzón de baño',
            ],
            [
                'name' => 'Nevo piloso',
            ],
            [
                'name' => 'Nevo piloso gigante',
            ],
            [
                'name' => 'Nevo sebáceo',
            ],
            [
                'name' => 'Nevo simple',
            ],
            [
                'name' => 'Nevos',
            ],
            [
                'name' => 'NF acústica bilateral central',
            ],
            [
                'name' => 'NF1',
            ],
            [
                'name' => 'NF2',
            ],
            [
                'name' => 'Niguas',
            ],
            [
                'name' => 'Nivel de glucemia alto en bebés',
            ],
            [
                'name' => 'Ooforitis',
            ],
            [
                'name' => 'Orzuelo',
            ],
            [
                'name' => 'Papilomas cutáneos',
            ],
            [
                'name' => 'Pápulas perladas',
            ],
            [
                'name' => 'Parafimosis',
            ],
            [
                'name' => 'Parches en la lengua',
            ],
            [
                'name' => 'Paroniquia',
            ],
            [
                'name' => 'Parvovirus B19',
            ],
            [
                'name' => 'Patología ungueal',
            ],
            [
                'name' => 'Pediculosis',
            ],
            [
                'name' => 'Pelagra',
            ],
            [
                'name' => 'Pénfigo seborreico',
            ],
            [
                'name' => 'Pénfigo vulgar',
            ],
            [
                'name' => 'Penfigoide ampolloso',
            ],
            [
                'name' => 'Pérdida del cabello en hombres',
            ],
            [
                'name' => 'Pérdida del cabello en mujeres',
            ],
            [
                'name' => 'Pericondritis',
            ],
            [
                'name' => 'Pian',
            ],
            [
                'name' => 'Pie de atleta',
            ],
            [
                'name' => 'Piel grasa',
            ],
            [
                'name' => 'Piel sensible',
            ],
            [
                'name' => 'Piojos de la cabeza',
            ],
            [
                'name' => 'Piojos púbicos',
            ],
            [
                'name' => 'Pitiriasis alba',
            ],
            [
                'name' => 'Pitiriasis roja',
            ],
            [
                'name' => 'Pitiriasis rosada',
            ],
            [
                'name' => 'Pitiriasis rubra',
            ],
            [
                'name' => 'Pitiriasis versicolor',
            ],
            [
                'name' => 'Pólipos auriculares',
            ],
            [
                'name' => 'Poliserositis familiar recurrente',
            ],
            [
                'name' => 'Ponfólix (ponfólice)',
            ],
            [
                'name' => 'Porfiria',
            ],
            [
                'name' => 'Porfiria aguda intermitente',
            ],
            [
                'name' => 'Porfiria eritropoyética congénita',
            ],
            [
                'name' => 'Protoporfiria eritropoyética',
            ],
            [
                'name' => 'Prurito en la ingle',
            ],
            [
                'name' => 'Psoriasis',
            ],
            [
                'name' => 'Psoriasis en gotas',
            ],
            [
                'name' => 'Psoriasis en placa',
            ],
            [
                'name' => 'Psoriasis guttata',
            ],
            [
                'name' => 'Pulgas',
            ],
            [
                'name' => 'Púrpura anafilactoide',
            ],
            [
                'name' => 'Queratosis actínica',
            ],
            [
                'name' => 'Queratosis actínica solar',
            ],
            [
                'name' => 'Queratosis obturante',
            ],
            [
                'name' => 'Queratosis pilar',
            ],
            [
                'name' => 'Queratosis seborreica',
            ],
            [
                'name' => 'Queratosis senil',
            ],
            [
                'name' => 'Queratosis solar',
            ],
            [
                'name' => 'Quinta enfermedad',
            ],
            [
                'name' => 'Quiste dermoide maligno',
            ],
            [
                'name' => 'Rosácea',
            ],
            [
                'name' => 'Rosácea fimatosa',
            ],
            [
                'name' => 'Roséola',
            ],
            [
                'name' => 'Sarampión',
            ],
            [
                'name' => 'Sarampión alemán',
            ],
            [
                'name' => 'Sarampión de tres días',
            ],
            [
                'name' => 'Sarcoidosis',
            ],
            [
                'name' => 'Sarna',
            ],
            [
                'name' => 'Sífilis congénita',
            ],
            [
                'name' => 'Sífilis primaria',
            ],
            [
                'name' => 'Síndrome de Bloch-Sulzberger',
            ],
            [
                'name' => 'Síndrome de CREST',
            ],
            [
                'name' => 'Síndrome de Cushing exógeno',
            ],
            [
                'name' => 'Síndrome de Gianotti-Crosti',
            ],
            [
                'name' => 'Síndrome de Gorlin',
            ],
            [
                'name' => 'Síndrome de Hermansky-Pudlak',
            ],
            [
                'name' => 'Síndrome de hiperinmunoglobulina E',
            ],
            [
                'name' => 'Síndrome de hipopituitarismo',
            ],
            [
                'name' => 'Síndrome de Hunt',
            ],
            [
                'name' => 'Síndrome de Job',
            ],
            [
                'name' => 'Síndrome de Kallmann',
            ],
            [
                'name' => 'Síndrome de la piel escaldada',
            ],
            [
                'name' => 'Síndrome de lentigos múltiples',
            ],
            [
                'name' => 'Síndrome de McCune-Albright',
            ],
            [
                'name' => 'Síndrome de Reiter',
            ],
            [
                'name' => 'Síndrome de Sheehan',
            ],
            [
                'name' => 'Síndrome de shock por dengue',
            ],
            [
                'name' => 'Síndrome de Weber-Cockayne',
            ],
            [
                'name' => 'Síndrome del cabello acerado',
            ],
            [
                'name' => 'Síndrome del leopardo',
            ],
            [
                'name' => 'Síndrome del nevo de células basales',
            ],
            [
                'name' => 'Síndrome estafilocócico de la piel escaldada (SSS)',
            ],
            [
                'name' => 'Tiña',
            ],
            [
                'name' => 'Tiña circinada',
            ],
            [
                'name' => 'Tiña corporal',
            ],
            [
                'name' => 'Tiña crural',
            ],
            [
                'name' => 'Tiña de la cabeza',
            ],
            [
                'name' => 'Tiña de los pies',
            ],
            [
                'name' => 'Tiña del cuerpo',
            ],
            [
                'name' => 'Tiña inguinal',
            ],
            [
                'name' => 'Tiña tonsurante',
            ],
            [
                'name' => 'Tiña versicolor',
            ],
            [
                'name' => 'Transpiración excesiva',
            ],
            [
                'name' => 'Trastorno de Hartnup',
            ],
            [
                'name' => 'Tricoclasia',
            ],
            [
                'name' => 'Úlcera roedora',
            ],
            [
                'name' => 'Vaginitis por tricomonas',
            ],
            [
                'name' => 'Verruga vulgar',
            ],
            [
                'name' => 'Verrugas',
            ],
            [
                'name' => 'Verrugas del pene',
            ],
            [
                'name' => 'Verrugas filiformes',
            ],
            [
                'name' => 'Verrugas genitales',
            ],
            [
                'name' => 'Verrugas periungueales',
            ],
            [
                'name' => 'Verrugas planas juveniles',
            ],
            [
                'name' => 'Verrugas subungueales',
            ],
            [
                'name' => 'Verrugas venéreas',
            ],
            [
                'name' => 'Virus del papiloma humano (VPH)',
            ],
            [
                'name' => 'Virus ECHO',
            ],
            [
                'name' => 'Vitiligo',
            ],
            [
                'name' => 'Xantoma',
            ],
            [
                'name' => 'Xerodermia pigmentosa',
            ],
            [
                'name' => 'Xerosis',
            ],
            [
                'name' => 'Yatobyo (Japón)',
            ],
            [
                'name' => 'Zumaque venenoso',
            ],
            [
                'name' => 'Anorexia',
            ],
            [
                'name' => 'Ansiedad',
            ],
            [
                'name' => 'Bulímia',
            ],
            [
                'name' => 'Depresión en los ancianos',
            ],
            [
                'name' => 'Diabetes',
            ],
            [
                'name' => 'Diabetes tipo 1',
            ],
            [
                'name' => 'Enfermedades de la tiroides',
            ],
            [
                'name' => 'Hígado graso',
            ],
            [
                'name' => 'Hipoglucemia',
            ],
            [
                'name' => 'Hipotiroidismo',
            ],
            [
                'name' => 'Nefropatía diabética',
            ],
            [
                'name' => 'Obesidad',
            ],
            [
                'name' => 'Síndrome de resistencia a la insulina',
            ],
            [
                'name' => 'Síndrome metabólico',
            ],
            [
                'name' => 'Tumor pituitario (tumor de la hipófisis)',
            ],
            [
                'name' => 'Acidosis láctica',
            ],
            [
                'name' => 'Acidosis metabólica',
            ],
            [
                'name' => 'Acondrogénesis',
            ],
            [
                'name' => 'Acromegalia',
            ],
            [
                'name' => 'Adenoma hipofisario secretor de prolactina',
            ],
            [
                'name' => 'Adenoma paratiroideo',
            ],
            [
                'name' => 'Adenoma secretante',
            ],
            [
                'name' => 'Adenoma somatotrófico',
            ],
            [
                'name' => 'Adrenoleucodistrofia',
            ],
            [
                'name' => 'Adrenoleucodistrofia ligada al cromosoma X',
            ],
            [
                'name' => 'Adrenomieloneuropatía',
            ],
            [
                'name' => 'ALD',
            ],
            [
                'name' => 'Amenorrea primaria',
            ],
            [
                'name' => 'Andropausia',
            ],
            [
                'name' => 'Apolipoproteína E deficiente o defectuosa',
            ],
            [
                'name' => 'Bebé de madre diabética',
            ],
            [
                'name' => 'Bocio nodular',
            ],
            [
                'name' => 'Bocio tirotóxico difuso',
            ],
            [
                'name' => 'Celiaquía',
            ],
            [
                'name' => 'Cetoacidosis',
            ],
            [
                'name' => 'Cetoacidosis diabética',
            ],
            [
                'name' => 'Coma diabético hiperosmolar hiperglucémico',
            ],
            [
                'name' => 'Coma hiperosmolar hiperglucémico no cetónico',
            ],
            [
                'name' => 'Complejo de Schilder-Addison',
            ],
            [
                'name' => 'Craneofaringioma',
            ],
            [
                'name' => 'Cretinismo',
            ],
            [
                'name' => 'Crisis addisoniana',
            ],
            [
                'name' => 'Crisis hipertiroidea',
            ],
            [
                'name' => 'Crisis suprarrenal',
            ],
            [
                'name' => 'Crisis suprarrenal aguda',
            ],
            [
                'name' => 'Crisis tiroidea',
            ],
            [
                'name' => 'Crisis tirotóxica',
            ],
            [
                'name' => 'Daño nervioso diabético',
            ],
            [
                'name' => 'Defensas bajas',
            ],
            [
                'name' => 'Deficiencia de 21-hidroxilasa',
            ],
            [
                'name' => 'Deficiencia de alfa-L-iduronidasa',
            ],
            [
                'name' => 'Deficiencia de apolipoproteína B',
            ],
            [
                'name' => 'Deficiencia de esfingomielinasa',
            ],
            [
                'name' => 'Deficiencia de glucosa -6- fosfato deshidrogenasa',
            ],
            [
                'name' => 'Deficiencia de la hormona del crecimiento',
            ],
            [
                'name' => 'Deficiencia familiar de lipoproteinlipasa',
            ],
            [
                'name' => 'Desnutrición maligna',
            ],
            [
                'name' => 'Desnutrición proteica',
            ],
            [
                'name' => 'Diabetes gestacional',
            ],
            [
                'name' => 'Diabetes insípida central',
            ],
            [
                'name' => 'Diabetes insípida nefrogénica',
            ],
            [
                'name' => 'Diabetes tipo 2',
            ],
            [
                'name' => 'Diaforesis',
            ],
            [
                'name' => 'Disbetalipoproteinemia familiar',
            ],
            [
                'name' => 'Disfunción hipotalámica',
            ],
            [
                'name' => 'DKA',
            ],
            [
                'name' => 'DM',
            ],
            [
                'name' => 'Enanismo',
            ],
            [
                'name' => 'Enanismo hipofisario',
            ],
            [
                'name' => 'Enfermedad de Cushing',
            ],
            [
                'name' => 'Enfermedad de Cushing hipofisaria',
            ],
            [
                'name' => 'Enfermedad de Gaucher',
            ],
            [
                'name' => 'Enfermedad de Graves',
            ],
            [
                'name' => 'Enfermedad de los ovarios poliquísticos',
            ],
            [
                'name' => 'Enfermedad de Von Gierke',
            ],
            [
                'name' => 'Enfermedad ovárica poliquística',
            ],
            [
                'name' => 'Gigante hipofisario',
            ],
            [
                'name' => 'Gigantismo',
            ],
            [
                'name' => 'Hiperaldosteronismo primario y secundario',
            ],
            [
                'name' => 'Hiperandrogenismo',
            ],
            [
                'name' => 'Hipercalciemia relacionada con las paratiroides',
            ],
            [
                'name' => 'Hipercaliemia',
            ],
            [
                'name' => 'Hipercortisolismo',
            ],
            [
                'name' => 'Hiperlipidemia',
            ],
            [
                'name' => 'Hiperlipoproteinemia',
            ],
            [
                'name' => 'Hiperplasia suprarrenal congénita',
            ],
            [
                'name' => 'Hipertiroidismo',
            ],
            [
                'name' => 'Hipertiroidismo congénito',
            ],
            [
                'name' => 'Hipertiroidismo provocado',
            ],
            [
                'name' => 'Hipertrigliceridemia familiar',
            ],
            [
                'name' => 'Hipocaliemia',
            ],
            [
                'name' => 'Hipogonadismo primario en hombres',
            ],
            [
                'name' => 'Hiponatremia euvolémica',
            ],
            [
                'name' => 'Hipoparatiroidismo',
            ],
            [
                'name' => 'Hipopituitarismo',
            ],
            [
                'name' => 'Hipotiroidismo central',
            ],
            [
                'name' => 'Hipotiroidismo congénito',
            ],
            [
                'name' => 'Hipotiroidismo en adultos',
            ],
            [
                'name' => 'Hipotiroidismo en bebés',
            ],
            [
                'name' => 'Hipotiroidismo inducido por medicamentos',
            ],
            [
                'name' => 'Hipotiroidismo secundario',
            ],
            [
                'name' => 'HONK=> coma hiperosmolar no cetónico',
            ],
            [
                'name' => 'Incidentaloma de tiroides',
            ],
            [
                'name' => 'Insuficiencia Adrenal',
            ],
            [
                'name' => 'Insuficiencia corticosuprarrenal crónica',
            ],
            [
                'name' => 'Insuficiencia en el crecimiento',
            ],
            [
                'name' => 'Insuficiencia hipofisaria',
            ],
            [
                'name' => 'Insuficiencia suprarrenal aguda',
            ],
            [
                'name' => 'Insuficiencia suprarrenal exógena',
            ],
            [
                'name' => 'Insuficiencia suprarrenal inducida por fármacos',
            ],
            [
                'name' => 'Insuficiencia suprarrenal primaria',
            ],
            [
                'name' => 'Menopausia',
            ],
            [
                'name' => 'Mixedema',
            ],
            [
                'name' => 'Mononeuropatía del III par craneal de tipo diabético',
            ],
            [
                'name' => 'Monosomía X',
            ],
            [
                'name' => 'Neuropatía diabética',
            ],
            [
                'name' => 'NKKKC',
            ],
            [
                'name' => 'Nutrición inadecuada',
            ],
            [
                'name' => 'Osteítis fibroquística',
            ],
            [
                'name' => 'Osteítis fibrosa',
            ],
            [
                'name' => 'Osteodistrofia hereditaria de Albright',
            ],
            [
                'name' => 'Osteoporosis',
            ],
            [
                'name' => 'Panhipopituitarismo',
            ],
            [
                'name' => 'Parálisis del tercer nervio craneal',
            ],
            [
                'name' => 'Parálisis del tercer nervio craneal en diabéticos',
            ],
            [
                'name' => 'Parálisis del tercer nervio craneal preservador de la pupila',
            ],
            [
                'name' => 'Parálisis oculomotora',
            ],
            [
                'name' => 'Parálisis periódica tirotóxica',
            ],
            [
                'name' => 'Parálisis tirotóxica periódica',
            ],
            [
                'name' => 'Patologías del crecimiento',
            ],
            [
                'name' => 'Perimenopausia',
            ],
            [
                'name' => 'Posmenopausia',
            ],
            [
                'name' => 'Prolactinoma',
            ],
            [
                'name' => 'Prolactinoma en las mujeres',
            ],
            [
                'name' => 'Prolactinoma en los hombres',
            ],
            [
                'name' => 'Pubertad precoz',
            ],
            [
                'name' => 'Reticuloendoteliosis leucémica',
            ],
            [
                'name' => 'Sangrado anovulatorio',
            ],
            [
                'name' => 'Secreción ectópica de hormona antidiurética',
            ],
            [
                'name' => 'Seudohipoparatiroidismo',
            ],
            [
                'name' => 'Seudoquiste pancreático',
            ],
            [
                'name' => 'Shock insulínico',
            ],
            [
                'name' => 'Síndrome de Alström',
            ],
            [
                'name' => 'Síndrome de Bonnevie-Ullrich',
            ],
            [
                'name' => 'Síndrome de Conn',
            ],
            [
                'name' => 'Síndrome de Cushing',
            ],
            [
                'name' => 'Síndrome de Cushing debido a un tumor suprarrenal',
            ],
            [
                'name' => 'Síndrome de Cushing ectópico',
            ],
            [
                'name' => 'Síndrome de Cushing inducido por corticosteroides',
            ],
            [
                'name' => 'Síndrome de Cushing yatrógeno',
            ],
            [
                'name' => 'Síndrome de Ellis-van Creveld',
            ],
            [
                'name' => 'Síndrome de la silla turca vacía',
            ],
            [
                'name' => 'Síndrome de los ovarios poliquísticos (PCOS)',
            ],
            [
                'name' => 'Síndrome de McArdle',
            ],
            [
                'name' => 'Síndrome de Prader-Willi',
            ],
            [
                'name' => 'Síndrome de Reifenstein',
            ],
            [
                'name' => 'Síndrome de Silver',
            ],
            [
                'name' => 'Síndrome de Waterhouse-Friderichsen',
            ],
            [
                'name' => 'Síndrome genitosuprarrenal',
            ],
            [
                'name' => 'Síndrome premenstrual (SPM)',
            ],
            [
                'name' => 'Sobrepeso',
            ],
            [
                'name' => 'Sobreproducción ovárica de andrógenos',
            ],
            [
                'name' => 'Tiroides subesternal',
            ],
            [
                'name' => 'Tiroiditis autoinmunitaria',
            ],
            [
                'name' => 'Tiroiditis crónica (Enfermedad de Hashimoto)',
            ],
            [
                'name' => 'Tiroiditis de células gigantes',
            ],
            [
                'name' => 'Tiroiditis de DeQuervain',
            ],
            [
                'name' => 'Tiroiditis de Hashimoto',
            ],
            [
                'name' => 'Tiroiditis granulomatosa subaguda',
            ],
            [
                'name' => 'Tiroiditis indolora',
            ],
            [
                'name' => 'Tiroiditis linfocítica',
            ],
            [
                'name' => 'Tiroiditis linfocítica subaguda',
            ],
            [
                'name' => 'Tiroiditis no supurativa subaguda',
            ],
            [
                'name' => 'Tiroiditis silenciosa',
            ],
            [
                'name' => 'Tiroiditis subaguda',
            ],
            [
                'name' => 'Tirotoxicosis',
            ],
            [
                'name' => 'Tirotoxicosis medicamentosa',
            ],
            [
                'name' => 'Tirotoxicosis provocada',
            ],
            [
                'name' => 'Tirotoxicosis simulada',
            ],
            [
                'name' => 'Transtornos de las suprarrenales',
            ],
            [
                'name' => 'Trastorno disfórico premenstrual (TDPM)',
            ],
            [
                'name' => 'Trastornos hormonales',
            ],
            [
                'name' => 'Tumor hipofisario',
            ],
            [
                'name' => 'Cirrosis biliar primaria',
            ],
            [
                'name' => 'Colangitis biliar',
            ],
            [
                'name' => 'Colitits ulcerativa',
            ],
            [
                'name' => 'Diarrea crónica',
            ],
            [
                'name' => 'Gastroparesia',
            ],
            [
                'name' => 'Hepatitis autoinmunitaria',
            ],
            [
                'name' => 'Intolerancia a la lactosa',
            ],
            [
                'name' => 'Síndrome de Zollinger-Ellison',
            ],
            [
                'name' => 'Autismo',
            ],
            [
                'name' => 'Bullying (acoso escolar)',
            ],
            [
                'name' => 'Callos y callosidades',
            ],
            [
                'name' => 'Cáncer del hígado',
            ],
            [
                'name' => 'Candidiasis oral (Algodoncillo)',
            ],
            [
                'name' => 'Cólico infantil',
            ],
            [
                'name' => 'Demencia senil',
            ],
            [
                'name' => 'Dentición',
            ],
            [
                'name' => 'Displasia congénita de la cadera',
            ],
            [
                'name' => 'Distrofia muscular',
            ],
            [
                'name' => 'Diverticulosis',
            ],
            [
                'name' => 'Enfermedad de Alzheimer',
            ],
            [
                'name' => 'Enfermedad mano-pie-boca',
            ],
            [
                'name' => 'Enfermedades terminales',
            ],
            [
                'name' => 'Enfisema pulmonar',
            ],
            [
                'name' => 'Espina bífida',
            ],
            [
                'name' => 'Fibrosis quística',
            ],
            [
                'name' => 'Gastroenteritis',
            ],
            [
                'name' => 'Glándula de Bartolino',
            ],
            [
                'name' => 'Hemiplejía',
            ],
            [
                'name' => 'Hemofilia',
            ],
            [
                'name' => 'Heridas',
            ],
            [
                'name' => 'Infección de la piel por bacterias',
            ],
            [
                'name' => 'Intubación nasogástrica o endotraqueal traumática',
            ],
            [
                'name' => 'Lesión de la vejiga y la uretra',
            ],
            [
                'name' => 'Parálisis espástica',
            ],
            [
                'name' => 'Parto prematuro',
            ],
            [
                'name' => 'Resfriado común',
            ],
            [
                'name' => 'Síndrome de Asperger',
            ],
            [
                'name' => 'Síndrome de Edwards',
            ],
            [
                'name' => 'Síndrome de muerte súbita del lactante',
            ],
            [
                'name' => 'Síndrome de Turner',
            ],
            [
                'name' => 'Tendinitis',
            ],
            [
                'name' => 'Tensión arterial baja',
            ],
            [
                'name' => 'Trastorno de conducta del sueño en fase REM',
            ],
            [
                'name' => 'Tumor',
            ],
            [
                'name' => 'Atrofia muscular espinal',
            ],
            [
                'name' => 'AVN',
            ],
            [
                'name' => 'Bursitis',
            ],
            [
                'name' => 'Bursitis epitroclear',
            ],
            [
                'name' => 'Bursitis retrocalcánea',
            ],
            [
                'name' => 'Causalgia',
            ],
            [
                'name' => 'Ciática',
            ],
            [
                'name' => 'Clavícula fracturada en un recién nacido',
            ],
            [
                'name' => 'Contractura cervical',
            ],
            [
                'name' => 'Cuello torcido',
            ],
            [
                'name' => 'Curvatura de la columna',
            ],
            [
                'name' => 'Dolor de cabeza por contracción muscular',
            ],
            [
                'name' => 'Dolor de espalda inespecífico',
            ],
            [
                'name' => 'Dolor en la inserción del talón',
            ],
            [
                'name' => 'Dolor muscular',
            ],
            [
                'name' => 'Enfermedad de Parkinson',
            ],
            [
                'name' => 'Epicondilitis humeral',
            ],
            [
                'name' => 'Espasticidad',
            ],
            [
                'name' => 'Espondiloartropatía',
            ],
            [
                'name' => 'Fatiga crónica',
            ],
            [
                'name' => 'Fibromiositis',
            ],
            [
                'name' => 'Hernia de disco',
            ],
            [
                'name' => 'LDM',
            ],
            [
                'name' => 'Lesión cerebral en bebés',
            ],
            [
                'name' => 'Lesiones deportivas',
            ],
            [
                'name' => 'Leucodistrofia metacromática',
            ],
            [
                'name' => 'Miopatía hereditaria',
            ],
            [
                'name' => 'OPCA',
            ],
            [
                'name' => 'Osteopenia de la prematuridad',
            ],
            [
                'name' => 'Parálisis cerebral',
            ],
            [
                'name' => 'Parálisis de Erb-Duchenne',
            ],
            [
                'name' => 'Parálisis facial',
            ],
            [
                'name' => 'Postura jorobada',
            ],
            [
                'name' => 'Radiculopatía cervical',
            ],
            [
                'name' => 'Radiculopatía lumbar',
            ],
            [
                'name' => 'SDRC',
            ],
            [
                'name' => 'SDSR',
            ],
            [
                'name' => 'Síndrome de distrofia simpática refleja',
            ],
            [
                'name' => 'Síndrome de dolor miofascial',
            ],
            [
                'name' => 'Síndrome de Down',
            ],
            [
                'name' => 'Síndrome de fatiga crónica',
            ],
            [
                'name' => 'Síndrome de Williams',
            ],
            [
                'name' => 'Síndrome de Williams-Beuren',
            ],
            [
                'name' => 'Syrinx',
            ],
            [
                'name' => 'Tendinitis del manguito de los rotadores',
            ],
            [
                'name' => 'Tendinitis, esguinces articulares',
            ],
            [
                'name' => 'Absceso del ano y el recto',
            ],
            [
                'name' => 'Adenocarcinoma del estómago',
            ],
            [
                'name' => 'Agente delta (hepatitis D)',
            ],
            [
                'name' => 'Amebiasis',
            ],
            [
                'name' => 'Amebiasis intestinal',
            ],
            [
                'name' => 'Anisakiasis',
            ],
            [
                'name' => 'Anorexia nerviosa',
            ],
            [
                'name' => 'Anquilostomosis',
            ],
            [
                'name' => 'Ascariasis',
            ],
            [
                'name' => 'Ascitis',
            ],
            [
                'name' => 'Atresia biliar',
            ],
            [
                'name' => 'Atrofia multisistémica',
            ],
            [
                'name' => 'Ausencia del factor intrínseco',
            ],
            [
                'name' => 'Bilirrubinemia benigna no conjugada',
            ],
            [
                'name' => 'Botulismo',
            ],
            [
                'name' => 'Cáncer colorrectal',
            ],
            [
                'name' => 'Cáncer de las vías biliares',
            ],
            [
                'name' => 'Carencia del factor intrínseco',
            ],
            [
                'name' => 'CBP',
            ],
            [
                'name' => 'Cirrosis',
            ],
            [
                'name' => 'Cirrosis de Laennec',
            ],
            [
                'name' => 'Cirrosis o hepatitis alcohólica',
            ],
            [
                'name' => 'Cisticercosis',
            ],
            [
                'name' => 'Colangiocarcinoma',
            ],
            [
                'name' => 'Colangitis esclerosante primaria',
            ],
            [
                'name' => 'Cólera',
            ],
            [
                'name' => 'Colestasis',
            ],
            [
                'name' => 'Colestasis inducida por fármacos',
            ],
            [
                'name' => 'Colestasis intrahepática',
            ],
            [
                'name' => 'Cólico biliar',
            ],
            [
                'name' => 'Colitis asociada con antibióticos',
            ],
            [
                'name' => 'Colitis funcional',
            ],
            [
                'name' => 'Colitis mucosa',
            ],
            [
                'name' => 'Colitis por citomegalovirus',
            ],
            [
                'name' => 'Colitis por laxantes',
            ],
            [
                'name' => 'Colitis seudomembranosa',
            ],
            [
                'name' => 'Colitis ulcerosa',
            ],
            [
                'name' => 'Colon espástico',
            ],
            [
                'name' => 'Coma hepático',
            ],
            [
                'name' => 'Condiciones relacionadas con ictericia',
            ],
            [
                'name' => 'Crecimiento excesivo de bacterias en el intestino',
            ],
            [
                'name' => 'Cryptosporidiosis',
            ],
            [
                'name' => 'Deficiencia de beta galactosidasa',
            ],
            [
                'name' => 'Deficiencia de disacaridasa',
            ],
            [
                'name' => 'Deficiencia de Fructosa 1,6 bifosfato aldolasa',
            ],
            [
                'name' => 'Deficiencia de galactosa-1-fosfatouridil transferasa',
            ],
            [
                'name' => 'Deficiencia de galactosa-6-fosfato epimerasa',
            ],
            [
                'name' => 'Deficiencia de glucuronil transferasa (Crigler-Najjar tipo I)',
            ],
            [
                'name' => 'Deficiencia de iduronato sulfatasa',
            ],
            [
                'name' => 'Deficiencia de lactasa',
            ],
            [
                'name' => 'Deficiencia de vitamina B12 (malabsorción)',
            ],
            [
                'name' => 'Degeneración hepatocerebral',
            ],
            [
                'name' => 'Degeneración hepatocerebral crónica adquirida (no Wilsoniana)',
            ],
            [
                'name' => 'Degeneración hepatolenticular',
            ],
            [
                'name' => 'Delgadez',
            ],
            [
                'name' => 'Diarrea',
            ],
            [
                'name' => 'Diarrea bacteriana',
            ],
            [
                'name' => 'Diarrea inducida por medicamentos',
            ],
            [
                'name' => 'Diarrea infecciosa por Campylobacter',
            ],
            [
                'name' => 'Diarrea por E. coli',
            ],
            [
                'name' => 'Difilobotriasis',
            ],
            [
                'name' => 'Discinesia biliar',
            ],
            [
                'name' => 'Disentería amebiana',
            ],
            [
                'name' => 'Disfagia',
            ],
            [
                'name' => 'Disfagia sideropénica',
            ],
            [
                'name' => 'Disfunción hepática constitucional',
            ],
            [
                'name' => 'Dolor abdominal',
            ],
            [
                'name' => 'Duodenitis',
            ],
            [
                'name' => 'E. Vermacularis',
            ],
            [
                'name' => 'Encefalopatía bilirrubínica',
            ],
            [
                'name' => 'Encefalopatía hepática',
            ],
            [
                'name' => 'Enfermedad biliar',
            ],
            [
                'name' => 'Enfermedad celíaca (esprúe)',
            ],
            [
                'name' => 'Enfermedad de la hamburguesa',
            ],
            [
                'name' => 'Enfermedad de Whipple',
            ],
            [
                'name' => 'Enfermedad de Wilson',
            ],
            [
                'name' => 'Enfermedad gastrointestinal por CMV',
            ],
            [
                'name' => 'Enfermedad hepática',
            ],
            [
                'name' => 'Enfermedad hepática alcohólica',
            ],
            [
                'name' => 'Enteritis',
            ],
            [
                'name' => 'Enteritis por Campylobacter',
            ],
            [
                'name' => 'Enteritis por Campylobacter a causa de intoxicación por alimentos',
            ],
            [
                'name' => 'Enteritis por criptosporidio',
            ],
            [
                'name' => 'Enteritis por radiación',
            ],
            [
                'name' => 'Enteritis por Shigella',
            ],
            [
                'name' => 'Enterobius vermacularis',
            ],
            [
                'name' => 'Enterocolitis por salmonela',
            ],
            [
                'name' => 'Enteromerocele',
            ],
            [
                'name' => 'Enteropatía perdedora de proteínas',
            ],
            [
                'name' => 'Enteropatía por radiación',
            ],
            [
                'name' => 'Enteropatía por sensibilidad al gluten',
            ],
            [
                'name' => 'Esofagitis por cándida',
            ],
            [
                'name' => 'Esofagitis por citomegalovirus',
            ],
            [
                'name' => 'Esofagitis por herpes',
            ],
            [
                'name' => 'Espasmos del esófago',
            ],
            [
                'name' => 'Espasmos esofágicos difusos',
            ],
            [
                'name' => 'Estenosis pilórica hipertrófica congénita',
            ],
            [
                'name' => 'Estomatitis candidósica',
            ],
            [
                'name' => 'Estomatitis de Vincent',
            ],
            [
                'name' => 'Estreñimiento',
            ],
            [
                'name' => 'Estreñimiento en embarazadas',
            ],
            [
                'name' => 'Estrongiloidiasis',
            ],
            [
                'name' => 'Faringitis estreptocócica',
            ],
            [
                'name' => 'Femorocele',
            ],
            [
                'name' => 'Fibrosis hepática',
            ],
            [
                'name' => 'Fibrosis retroperitoneal',
            ],
            [
                'name' => 'Fibrosis retroperitoneal idiopática',
            ],
            [
                'name' => 'Fiebre de Chipre',
            ],
            [
                'name' => 'Fiebre de Gibraltar',
            ],
            [
                'name' => 'Fiebre de los arrozales',
            ],
            [
                'name' => 'Fiebre de Query',
            ],
            [
                'name' => 'Fiebre del fango',
            ],
            [
                'name' => 'Fiebre icterohemorrágica',
            ],
            [
                'name' => 'Fiebre ondulante',
            ],
            [
                'name' => 'Fiebre por Leptospira canicola',
            ],
            [
                'name' => 'Fiebre Q',
            ],
            [
                'name' => 'Fiebre Q temprana',
            ],
            [
                'name' => 'Fiebre viral hemorrágica',
            ],
            [
                'name' => 'Galactosemia',
            ],
            [
                'name' => 'Gastritis aguda',
            ],
            [
                'name' => 'Gastritis por estrés',
            ],
            [
                'name' => 'Gastritis por Helicobacter pylori',
            ],
            [
                'name' => 'Gastroenteritis aguda',
            ],
            [
                'name' => 'Gastroenteritis bacteriana',
            ],
            [
                'name' => 'Gastroenteritis por citomegalovirus',
            ],
            [
                'name' => 'Giardia',
            ],
            [
                'name' => 'Gripe de tipo B',
            ],
            [
                'name' => 'Gripe de tipo A',
            ],
            [
                'name' => 'Gripe estomacal',
            ],
            [
                'name' => 'Helicobacter pylori',
            ],
            [
                'name' => 'Helmintosis',
            ],
            [
                'name' => 'Hepatitis',
            ],
            [
                'name' => 'Hepatitis A',
            ],
            [
                'name' => 'Hepatitis B',
            ],
            [
                'name' => 'Hepatitis C',
            ],
            [
                'name' => 'Hepatitis crónica leve',
            ],
            [
                'name' => 'Hepatitis crónica y persistente',
            ],
            [
                'name' => 'Hepatitis inducida por medicamentos',
            ],
            [
                'name' => 'Hepatitis lobular crónica',
            ],
            [
                'name' => 'Hepatitis lupoide',
            ],
            [
                'name' => 'Hepatitis no A o no B',
            ],
            [
                'name' => 'Hepatitis tóxica',
            ],
            [
                'name' => 'Hepatitis viral',
            ],
            [
                'name' => 'Hepatopatía alcohólica',
            ],
            [
                'name' => 'Hernia femoral',
            ],
            [
                'name' => 'Hidropesía',
            ],
            [
                'name' => 'Himenolepiasis',
            ],
            [
                'name' => 'Hiperemesis gravídica',
            ],
            [
                'name' => 'HUS',
            ],
            [
                'name' => 'Ictericia hemorrágica',
            ],
            [
                'name' => 'Impactación fecal o intestinal',
            ],
            [
                'name' => 'Indigestión nerviosa',
            ],
            [
                'name' => 'Infección del esófago por cándida',
            ],
            [
                'name' => 'Infección del esófago por hongos levaduriformes',
            ],
            [
                'name' => 'Infección por el virus del Ébola',
            ],
            [
                'name' => 'Infección por enterovirus que no causa polio',
            ],
            [
                'name' => 'Infección por hongos',
            ],
            [
                'name' => 'Infección por la tenia enana (Hymenolepis nana )',
            ],
            [
                'name' => 'Infección por oxiuros',
            ],
            [
                'name' => 'Infección por T. trichiura',
            ],
            [
                'name' => 'Infección por tenia',
            ],
            [
                'name' => 'Infección por tenia de los peces (Diphyllobothrium latum )',
            ],
            [
                'name' => 'Inflamación del esófago',
            ],
            [
                'name' => 'Inflamación del recto',
            ],
            [
                'name' => 'Inflamación rectal',
            ],
            [
                'name' => 'Inflamación retroperitoneal',
            ],
            [
                'name' => 'Insomnio primario',
            ],
            [
                'name' => 'Intolerancia a la fructosa',
            ],
            [
                'name' => 'Intolerancia al gluten',
            ],
            [
                'name' => 'Intoxicación alimentaria por E. coli',
            ],
            [
                'name' => 'Intoxicación alimentaria por estafilococo dorado',
            ],
            [
                'name' => 'Intoxicación por etilenglicol',
            ],
            [
                'name' => 'Laceraciones mucosas de la unión cardioesofágica',
            ],
            [
                'name' => 'Larva migratoria visceral',
            ],
            [
                'name' => 'Leiomioma en el intestino',
            ],
            [
                'name' => 'Lesión en el intestino delgado inducida por radiación',
            ],
            [
                'name' => 'Lipodistrofia intestinal',
            ],
            [
                'name' => 'Listeriosis',
            ],
            [
                'name' => 'Mericismo',
            ],
            [
                'name' => 'MPS 1 H',
            ],
            [
                'name' => 'MPS I S',
            ],
            [
                'name' => 'MPS III',
            ],
            [
                'name' => 'MPS IV',
            ],
            [
                'name' => 'Mucopolisacaridosis tipo I',
            ],
            [
                'name' => 'Mucopolisacaridosis tipo I S',
            ],
            [
                'name' => 'Mucopolisacaridosis tipo II',
            ],
            [
                'name' => 'Mucopolisacaridosis tipo IVA',
            ],
            [
                'name' => 'Mucopolisacaridosis tipo IVB',
            ],
            [
                'name' => 'Multiplicación excesiva de bacterias intestinales',
            ],
            [
                'name' => 'Neumonía por Legionela',
            ],
            [
                'name' => 'Neuropatía autónoma',
            ],
            [
                'name' => 'Neurosis intestinal',
            ],
            [
                'name' => 'OHSS',
            ],
            [
                'name' => 'Oxiuriasis',
            ],
            [
                'name' => 'Oxiuros',
            ],
            [
                'name' => 'Pancreatitis crónica',
            ],
            [
                'name' => 'Perforación intestinal',
            ],
            [
                'name' => 'Peritonitis paroxística benigna',
            ],
            [
                'name' => 'Peritonitis periódica',
            ],
            [
                'name' => 'Polineuropatía alcohólica',
            ],
            [
                'name' => 'Proctitis',
            ],
            [
                'name' => 'Proliferación excesiva de bacterias en el intestino delgado',
            ],
            [
                'name' => 'Reflujo gastroesofágico en bebés',
            ],
            [
                'name' => 'Retención fecal',
            ],
            [
                'name' => 'Retroperitonitis',
            ],
            [
                'name' => 'Salmonelosis',
            ],
            [
                'name' => 'Shigelosis',
            ],
            [
                'name' => 'Sialorrea',
            ],
            [
                'name' => 'Síndrome de asa ciega',
            ],
            [
                'name' => 'Síndrome de Bassen-Kornzweig',
            ],
            [
                'name' => 'Síndrome de Dubin-Johnson',
            ],
            [
                'name' => 'Síndrome de hiperestimulación ovárica',
            ],
            [
                'name' => 'Síndrome de Hunter',
            ],
            [
                'name' => 'Síndrome de Hurler',
            ],
            [
                'name' => 'Síndrome de Sanfilippo',
            ],
            [
                'name' => 'Síndrome de Scheie',
            ],
            [
                'name' => 'Síndrome del intestino corto',
            ],
            [
                'name' => 'Síndrome del intestino irritable',
            ],
            [
                'name' => 'Síndrome urémico hemolítico',
            ],
            [
                'name' => 'Sobredosis e intoxicación con barbitúricos',
            ],
            [
                'name' => 'Tenia',
            ],
            [
                'name' => 'Tenia de la rata',
            ],
            [
                'name' => 'Tenia del ganado vacuno (T. saginata )',
            ],
            [
                'name' => 'Tenia solitaria',
            ],
            [
                'name' => 'Tos crónica',
            ],
            [
                'name' => 'Toxocariasis',
            ],
            [
                'name' => 'Toxocarosis ocular',
            ],
            [
                'name' => 'Toxocarosis visceral',
            ],
            [
                'name' => 'Tricurosis o tricuriasis',
            ],
            [
                'name' => 'Triquinelosis',
            ],
            [
                'name' => 'Triquiniasis',
            ],
            [
                'name' => 'Triquinosis',
            ],
            [
                'name' => 'Tumor de células de Leydig',
            ],
            [
                'name' => 'Tumor de células de los islotes o tumor de células insulares',
            ],
            [
                'name' => 'Tumor de células de los islotes pancreáticos',
            ],
            [
                'name' => 'Úlcera gástrica',
            ],
            [
                'name' => 'V. cholerae',
            ],
            [
                'name' => 'Várices esofágicas sangrantes',
            ],
            [
                'name' => 'Virus de Norwalk',
            ],
            [
                'name' => 'Vómitos persistentes en el embarazo',
            ],
            [
                'name' => 'Anencefalia',
            ],
            [
                'name' => 'Coproporfiria hereditaria',
            ],
            [
                'name' => 'Corea de Huntington',
            ],
            [
                'name' => 'Disautonomía familiar',
            ],
            [
                'name' => 'Displasia fibrosa poliostótica',
            ],
            [
                'name' => 'Enfermedad de Charcot-Marie-Tooth',
            ],
            [
                'name' => 'Enfermedad de Krabbe',
            ],
            [
                'name' => 'Enfermedad de Niemann-Pick',
            ],
            [
                'name' => 'Esquizofrenia paranoide',
            ],
            [
                'name' => 'Hermafroditismo',
            ],
            [
                'name' => 'Malformaciones congénitas',
            ],
            [
                'name' => 'Paramiotomía congénita',
            ],
            [
                'name' => 'Progeria',
            ],
            [
                'name' => 'Síndrome de Aase-Smith',
            ],
            [
                'name' => 'Síndrome de Morquio',
            ],
            [
                'name' => 'Síndrome de Sturge-Weber',
            ],
            [
                'name' => 'ACV',
            ],
            [
                'name' => 'Cataratas',
            ],
            [
                'name' => 'CJD',
            ],
            [
                'name' => 'Delirium',
            ],
            [
                'name' => 'Demencia',
            ],
            [
                'name' => 'Demencia vascular',
            ],
            [
                'name' => 'Demencia con los cuerpos de Lewy',
            ],
            [
                'name' => 'Deshidratación',
            ],
            [
                'name' => 'Dislipidemia',
            ],
            [
                'name' => 'Enfermedad articular degenerativa',
            ],
            [
                'name' => 'Parálisis progresiva supranuclear',
            ],
            [
                'name' => 'Presbiacusia',
            ],
            [
                'name' => 'Síndrome de caídas',
            ],
            [
                'name' => 'Temblor inducido por fármacos',
            ],
            [
                'name' => 'Trastorno depresivo grave',
            ],
            [
                'name' => 'Trastornos de la marcha',
            ],
            [
                'name' => 'Trastornos del sueño en personas mayores',
            ],
            [
                'name' => 'Trastornos en la alimentación del anciano',
            ],
            [
                'name' => 'Ablación de la placenta',
            ],
            [
                'name' => 'Aborto consumado',
            ],
            [
                'name' => 'Aborto electivo o terapéutico',
            ],
            [
                'name' => 'Aborto espontáneo',
            ],
            [
                'name' => 'Aborto incompleto',
            ],
            [
                'name' => 'Aborto inevitable',
            ],
            [
                'name' => 'Aborto séptico',
            ],
            [
                'name' => 'Aborto terapéutico',
            ],
            [
                'name' => 'Abrupción placentaria',
            ],
            [
                'name' => 'Absceso de Bartolino',
            ],
            [
                'name' => 'Absceso en la glándula areolar',
            ],
            [
                'name' => 'Absceso mamario',
            ],
            [
                'name' => 'Adenocarcinoma del útero',
            ],
            [
                'name' => 'Adenomioma',
            ],
            [
                'name' => 'Adenomiosis',
            ],
            [
                'name' => 'Adherencia intrauterina',
            ],
            [
                'name' => 'Adherencia pélvica',
            ],
            [
                'name' => 'Alcohol en el embarazo',
            ],
            [
                'name' => 'Alteración seminal',
            ],
            [
                'name' => 'Amenaza de aborto',
            ],
            [
                'name' => 'Amenaza de aborto espontáneo',
            ],
            [
                'name' => 'Amenorrea secundaria',
            ],
            [
                'name' => 'Apatía sexual',
            ],
            [
                'name' => 'Arrenoblastoma',
            ],
            [
                'name' => 'Arrenoblastoma del ovario',
            ],
            [
                'name' => 'Ausencia de la menstruación',
            ],
            [
                'name' => 'Bacteriuria asintomática',
            ],
            [
                'name' => 'Bridas amnióticas',
            ],
            [
                'name' => 'Cáncer de la vulva',
            ],
            [
                'name' => 'Cáncer de útero',
            ],
            [
                'name' => 'Cáncer de vagina',
            ],
            [
                'name' => 'Cáncer endometrial',
            ],
            [
                'name' => 'Cáncer vaginal',
            ],
            [
                'name' => 'Candidiasis vaginal',
            ],
            [
                'name' => 'Carcinoma lobulillar',
            ],
            [
                'name' => 'Cervicitis',
            ],
            [
                'name' => 'Chancroide',
            ],
            [
                'name' => 'Chikungunya',
            ],
            [
                'name' => 'Cistitis',
            ],
            [
                'name' => 'Citomegalovirus (CMV)',
            ],
            [
                'name' => 'Clamidia',
            ],
            [
                'name' => 'Corioblastoma',
            ],
            [
                'name' => 'Coriocarcinoma',
            ],
            [
                'name' => 'Corioepitelioma',
            ],
            [
                'name' => 'Deficiencia de gonadotropina',
            ],
            [
                'name' => 'Deficiencia gonadal',
            ],
            [
                'name' => 'Desprendimiento placentario',
            ],
            [
                'name' => 'Desprendimiento prematuro de placenta',
            ],
            [
                'name' => 'Disfunción placentaria',
            ],
            [
                'name' => 'Disgenesia gonadal',
            ],
            [
                'name' => 'Displasia cervical',
            ],
            [
                'name' => 'Displasia mamaria',
            ],
            [
                'name' => 'Dolor asociado con la ovulación',
            ],
            [
                'name' => 'Dolor en mitad del ciclo menstrual',
            ],
            [
                'name' => 'Donovanosis',
            ],
            [
                'name' => 'DSD',
            ],
            [
                'name' => 'DUB',
            ],
            [
                'name' => 'Eclampsia',
            ],
            [
                'name' => 'Ectropión',
            ],
            [
                'name' => 'EIP (infección genital femenina)',
            ],
            [
                'name' => 'Embarazo',
            ],
            [
                'name' => 'Embarazo abdominal',
            ],
            [
                'name' => 'Embarazo anembrionario (Huevo huero)',
            ],
            [
                'name' => 'Embarazo de alto riesgo',
            ],
            [
                'name' => 'Embarazo de bajo riesgo',
            ],
            [
                'name' => 'Embarazo ectópico',
            ],
            [
                'name' => 'Embarazo en la adolescencia',
            ],
            [
                'name' => 'Embarazo molar',
            ],
            [
                'name' => 'Embarazo múltiple',
            ],
            [
                'name' => 'Embarazo tubárico',
            ],
            [
                'name' => 'Endometriosis',
            ],
            [
                'name' => 'Endometriosis interna',
            ],
            [
                'name' => 'Endometritis',
            ],
            [
                'name' => 'Enfermedad de transmisión sexual (ETS)',
            ],
            [
                'name' => 'Enfermedad fibroquística de las mamas',
            ],
            [
                'name' => 'Enfermedad inflamatoria pélvica (EIP)',
            ],
            [
                'name' => 'Enfermedad ovárica polifolicular',
            ],
            [
                'name' => 'Enfermedad trofoblástica gestacional',
            ],
            [
                'name' => 'Épulis',
            ],
            [
                'name' => 'Estenosis meatal',
            ],
            [
                'name' => 'Estenosis meatal uretral',
            ],
            [
                'name' => 'Esterilidad',
            ],
            [
                'name' => 'Exceso de flujo vaginal - leucorrea',
            ],
            [
                'name' => 'Faringitis gonocócica',
            ],
            [
                'name' => 'Fibroides',
            ],
            [
                'name' => 'Fibromioma',
            ],
            [
                'name' => 'Fisura vaginal',
            ],
            [
                'name' => 'Hematoma retroplacentario',
            ],
            [
                'name' => 'Hernia del piso pélvico',
            ],
            [
                'name' => 'Herpes genital',
            ],
            [
                'name' => 'Hidropesía fetal',
            ],
            [
                'name' => 'Hiperplasia endometrial benigna',
            ],
            [
                'name' => 'Hipertensión inducida por el embarazo',
            ],
            [
                'name' => 'Hipogonadismo',
            ],
            [
                'name' => 'Hipogonadismo secundario',
            ],
            [
                'name' => 'Huevo de Naboth',
            ],
            [
                'name' => 'Incapacidad para concebir',
            ],
            [
                'name' => 'Incontinencia urinaria de esfuerzo',
            ],
            [
                'name' => 'Infección de la vagina por levaduras',
            ],
            [
                'name' => 'Infección del tejido mamario',
            ],
            [
                'name' => 'Infección del tórax',
            ],
            [
                'name' => 'Infección mamaria',
            ],
            [
                'name' => 'Infección por VIH asintomática',
            ],
            [
                'name' => 'Infección por VIH primaria',
            ],
            [
                'name' => 'Infección urinaria en adultos',
            ],
            [
                'name' => 'Infección urinaria recurrente',
            ],
            [
                'name' => 'Infección vaginal por levaduras',
            ],
            [
                'name' => 'Infección vaginal por tricomonas',
            ],
            [
                'name' => 'Infecciones por clamidia en mujeres',
            ],
            [
                'name' => 'Infertilidad',
            ],
            [
                'name' => 'Infertilidad masculina',
            ],
            [
                'name' => 'Inflamación cervical',
            ],
            [
                'name' => 'Inflamación del cuello uterino',
            ],
            [
                'name' => 'Inflamación vaginal',
            ],
            [
                'name' => 'Insuficiencia placentaria',
            ],
            [
                'name' => 'Intersexualidad',
            ],
            [
                'name' => 'Intolerancia a la glucosa durante el embarazo',
            ],
            [
                'name' => 'IUGR',
            ],
            [
                'name' => 'Leiomioma',
            ],
            [
                'name' => 'LGV',
            ],
            [
                'name' => 'Linfogranuloma inguinal',
            ],
            [
                'name' => 'Linfogranuloma venéreo',
            ],
            [
                'name' => 'Linfopatía venérea',
            ],
            [
                'name' => 'Mala posición del útero',
            ],
            [
                'name' => 'Mastopatia fibroquística',
            ],
            [
                'name' => 'Meningitis sifilítica',
            ],
            [
                'name' => 'Mioma',
            ],
            [
                'name' => 'Miomas uterinos',
            ],
            [
                'name' => 'Náuseas persistentes en el embarazo',
            ],
            [
                'name' => 'Neoplasia intraepitelial cervical',
            ],
            [
                'name' => 'Neoplasia trofoblástica gestacional',
            ],
            [
                'name' => 'Neurosífilis',
            ],
            [
                'name' => 'NIC',
            ],
            [
                'name' => 'Obesidad en el embarazo',
            ],
            [
                'name' => 'Ovarios poliquísticos',
            ],
            [
                'name' => 'Ovulación dolorosa',
            ],
            [
                'name' => 'Papiloma intraductal',
            ],
            [
                'name' => 'Pérdida gestacional recurrente',
            ],
            [
                'name' => 'Placenta previa',
            ],
            [
                'name' => 'Polaquiuria',
            ],
            [
                'name' => 'Pólipos cervicales',
            ],
            [
                'name' => 'Poliquistosis ovárica',
            ],
            [
                'name' => 'Preeclampsia',
            ],
            [
                'name' => 'Puerperio',
            ],
            [
                'name' => 'Quiste del conducto de Gartner',
            ],
            [
                'name' => 'Quistes ováricos fisiológicos',
            ],
            [
                'name' => 'Quistes ováricos funcionales',
            ],
            [
                'name' => 'Relajación pélvica',
            ],
            [
                'name' => 'Restricción del crecimiento intrauterino',
            ],
            [
                'name' => 'Retención de líquido pulmonar fetal',
            ],
            [
                'name' => 'Retraso en el crecimiento intrauterino',
            ],
            [
                'name' => 'Retrodesviación uterina',
            ],
            [
                'name' => 'Retroversión del útero',
            ],
            [
                'name' => 'Rubéola',
            ],
            [
                'name' => 'Salpingitis',
            ],
            [
                'name' => 'Salpingo ooforitis',
            ],
            [
                'name' => 'Salpingo peritonitis',
            ],
            [
                'name' => 'Sangrado uterino anormal',
            ],
            [
                'name' => 'Sangrado uterino disfuncional',
            ],
            [
                'name' => 'Separación prematura de la placenta',
            ],
            [
                'name' => 'Sífilis fetal',
            ],
            [
                'name' => 'Síndrome 47 X-X-Y',
            ],
            [
                'name' => 'Síndrome antifosfolípido',
            ],
            [
                'name' => 'Síndrome de alcoholismo fetal',
            ],
            [
                'name' => 'Síndrome de Asherman',
            ],
            [
                'name' => 'Síndrome de dolor pélvico crónico',
            ],
            [
                'name' => 'Síndrome de Klinefelter',
            ],
            [
                'name' => 'Síndrome de shock tóxico',
            ],
            [
                'name' => 'Síndrome del shock tóxico por estafilococos',
            ],
            [
                'name' => 'Síndrome HELLP',
            ],
            [
                'name' => 'Tabes dorsal',
            ],
            [
                'name' => 'Toxoplasmosis congénita',
            ],
            [
                'name' => 'Trastornos de la menstruación',
            ],
            [
                'name' => 'Trastornos del desarrollo sexual',
            ],
            [
                'name' => 'Trastornos en el desarrollo de la vagina y vulva',
            ],
            [
                'name' => 'Trastornos en el desarrollo del aparato reproductor femenino',
            ],
            [
                'name' => 'Tricomoniasis',
            ],
            [
                'name' => 'Tumor vaginal',
            ],
            [
                'name' => 'TVP',
            ],
            [
                'name' => 'Uretritis masculina por clamidia',
            ],
            [
                'name' => 'Útero ladeado',
            ],
            [
                'name' => 'Vaginismo',
            ],
            [
                'name' => 'Vaginitis',
            ],
            [
                'name' => 'Vaginitis atrófica',
            ],
            [
                'name' => 'Vaginitis moniliásica',
            ],
            [
                'name' => 'Vejiga irritable',
            ],
            [
                'name' => 'Virus del Zika',
            ],
            [
                'name' => 'Vulvitis',
            ],
            [
                'name' => 'Vulvovaginitis',
            ],
            [
                'name' => 'Acantocitosis',
            ],
            [
                'name' => 'Afibrinogenemia congénita',
            ],
            [
                'name' => 'Agranulocitosis',
            ],
            [
                'name' => 'Anemia',
            ],
            [
                'name' => 'Anemia aplásica adquirida',
            ],
            [
                'name' => 'Anemia aplásica secundaria',
            ],
            [
                'name' => 'Anemia aquílica macrocítica',
            ],
            [
                'name' => 'Anemia de Fanconi',
            ],
            [
                'name' => 'Anemia drepanocítica',
            ],
            [
                'name' => 'Anemia ferropénica',
            ],
            [
                'name' => 'Anemia ferropénica en niños',
            ],
            [
                'name' => 'Anemia hemolítica',
            ],
            [
                'name' => 'Anemia hemolítica a causa de deficiencia de G-6-PD',
            ],
            [
                'name' => 'Anemia hemolítica autoinmunitaria idiopática',
            ],
            [
                'name' => 'Anemia hemolítica autoinmunológica',
            ],
            [
                'name' => 'Anemia hemolítica causada por químicos o toxinas',
            ],
            [
                'name' => 'Anemia hemolítica inmunitaria inducida por medicamentos',
            ],
            [
                'name' => 'Anemia idiopática aplásica',
            ],
            [
                'name' => 'Anemia macrocítica',
            ],
            [
                'name' => 'Anemia mediterránea',
            ],
            [
                'name' => 'Anemia megaloblástica',
            ],
            [
                'name' => 'Anemia perniciosa',
            ],
            [
                'name' => 'Anemia perniciosa congénita',
            ],
            [
                'name' => 'Anemia perniciosa juvenil',
            ],
            [
                'name' => 'Anemia por deficiencia de folato',
            ],
            [
                'name' => 'Anemia por deficiencia de hierro',
            ],
            [
                'name' => 'Anemia por deficiencia de hierro en los niños',
            ],
            [
                'name' => 'Anemia por enfermedad crónica',
            ],
            [
                'name' => 'Anemia por inflamación',
            ],
            [
                'name' => 'Anomalías congénitas de la función plaquetaria',
            ],
            [
                'name' => 'AOP',
            ],
            [
                'name' => 'Cáncer no Hodgkin',
            ],
            [
                'name' => 'Cáncer=> leucemia infantil aguda (LLA)',
            ],
            [
                'name' => 'CML',
            ],
            [
                'name' => 'Coagulación intravascular diseminada (CID)',
            ],
            [
                'name' => 'Coagulopatía',
            ],
            [
                'name' => 'Coagulopatía de consumo',
            ],
            [
                'name' => 'Defecto adquirido de la función plaquetaria',
            ],
            [
                'name' => 'Defectos congénitos de la función plaquetaria',
            ],
            [
                'name' => 'Deficiencia congénita de proteína C o S',
            ],
            [
                'name' => 'Deficiencia de ácido fólico',
            ],
            [
                'name' => 'Deficiencia de antitrombina III congénita',
            ],
            [
                'name' => 'Deficiencia de factor X',
            ],
            [
                'name' => 'Deficiencia de folato',
            ],
            [
                'name' => 'Deficiencia de G-6-PD',
            ],
            [
                'name' => 'Deficiencia de piruvatocinasa',
            ],
            [
                'name' => 'Deficiencia de protrombina',
            ],
            [
                'name' => 'Deficiencia de reductasa en eritrocitos',
            ],
            [
                'name' => 'Deficiencia de Stuart-Prower',
            ],
            [
                'name' => 'Deficiencia del factor extrínseco',
            ],
            [
                'name' => 'Deficiencia del factor II',
            ],
            [
                'name' => 'Deficiencia del factor V',
            ],
            [
                'name' => 'Deficiencia del factor VII',
            ],
            [
                'name' => 'Deficiencia del factor XII (factor de Hageman)',
            ],
            [
                'name' => 'Discrasia de células plasmáticas',
            ],
            [
                'name' => 'Discrasias',
            ],
            [
                'name' => 'Eliptocitosis de tipo hereditario',
            ],
            [
                'name' => 'Eliptocitosis hereditaria',
            ],
            [
                'name' => 'Enfermedad de Christmas',
            ],
            [
                'name' => 'Enfermedad de Glanzmann',
            ],
            [
                'name' => 'Enfermedad de la hemoglobina C',
            ],
            [
                'name' => 'Enfermedad de la hemoglobina M',
            ],
            [
                'name' => 'Enfermedad de la hemoglobina SS (Hb SS)',
            ],
            [
                'name' => 'Enfermedad de von Willebrand',
            ],
            [
                'name' => 'Enfermedad hemolítica del neonato inducida por Rh',
            ],
            [
                'name' => 'Enfermedad hemolítica del recién nacido',
            ],
            [
                'name' => 'Enfermedad hemorrágica del recién nacido',
            ],
            [
                'name' => 'Enfermedad por defecto de almacenamiento intraplaquetario',
            ],
            [
                'name' => 'Eritremia',
            ],
            [
                'name' => 'Eritroblastosis fetal',
            ],
            [
                'name' => 'Eritrocitosis megaloesplénica',
            ],
            [
                'name' => 'Esferocitosis',
            ],
            [
                'name' => 'Fibrinólisis primaria o secundaria',
            ],
            [
                'name' => 'Fiebre biduoterciana',
            ],
            [
                'name' => 'Fiebre cuartana',
            ],
            [
                'name' => 'Fiebre de las aguas negras o de los pantanos',
            ],
            [
                'name' => 'Fosfato bajo en sangre',
            ],
            [
                'name' => 'Granulocitopenia',
            ],
            [
                'name' => 'Granulopenia',
            ],
            [
                'name' => 'HCL',
            ],
            [
                'name' => 'Hemacromatosis',
            ],
            [
                'name' => 'Hematocromatosis',
            ],
            [
                'name' => 'Hemocromatosis',
            ],
            [
                'name' => 'Hemofilia A',
            ],
            [
                'name' => 'Hemofilia B',
            ],
            [
                'name' => 'Hemofilia por el factor IX',
            ],
            [
                'name' => 'Hemoglobina clínica C',
            ],
            [
                'name' => 'Hemoglobinopatía',
            ],
            [
                'name' => 'Hemoglobinopatías raras',
            ],
            [
                'name' => 'Hemoglobinuria paroxística nocturna',
            ],
            [
                'name' => 'Hiperesplenismo',
            ],
            [
                'name' => 'Hiperplasia linfofolicular',
            ],
            [
                'name' => 'Hiperplasia linfoide',
            ],
            [
                'name' => 'Hipertrofia linfofolicular',
            ],
            [
                'name' => 'Hipertrofia linfoide',
            ],
            [
                'name' => 'Hipofosfatemia',
            ],
            [
                'name' => 'Hipomagnesemia',
            ],
            [
                'name' => 'Hiponatremia hipovolémica',
            ],
            [
                'name' => 'Hiponatremia por dilución',
            ],
            [
                'name' => 'Hipoprotrombinemia',
            ],
            [
                'name' => 'HPN',
            ],
            [
                'name' => 'Incompatibilidad ABO',
            ],
            [
                'name' => 'Incompatibilidad RH',
            ],
            [
                'name' => 'Infección de los ganglios linfáticos',
            ],
            [
                'name' => 'Leucemia',
            ],
            [
                'name' => 'Leucemia aguda de la infancia',
            ],
            [
                'name' => 'Leucemia aguda granulocítica',
            ],
            [
                'name' => 'Leucemia aguda mieloide',
            ],
            [
                'name' => 'Leucemia crónica granulocítica',
            ],
            [
                'name' => 'Leucemia mielógena crónica (LMC)',
            ],
            [
                'name' => 'Leucemia no linfocítica aguda',
            ],
            [
                'name' => 'Linfadenopatía',
            ],
            [
                'name' => 'Linfoma cerebral',
            ],
            [
                'name' => 'Linfoma de alto grado de células B',
            ],
            [
                'name' => 'Linfoma de Hodgkin',
            ],
            [
                'name' => 'Linfoma de las células B',
            ],
            [
                'name' => 'Linfoma histiocítico',
            ],
            [
                'name' => 'Linfoma linfoblástico',
            ],
            [
                'name' => 'Linfoma linfocítico',
            ],
            [
                'name' => 'Linfoma linfoplasmacítico',
            ],
            [
                'name' => 'Linfoma no Hodgkin',
            ],
            [
                'name' => 'LLA',
            ],
            [
                'name' => 'LLC',
            ],
            [
                'name' => 'LMA',
            ],
            [
                'name' => 'LMC',
            ],
            [
                'name' => 'Macroglobulinemia de Waldenstrom',
            ],
            [
                'name' => 'Macroglobulinemia primaria',
            ],
            [
                'name' => 'Magnesio bajo en la sangre',
            ],
            [
                'name' => 'Meningococemia',
            ],
            [
                'name' => 'Metahemoglobinemia',
            ],
            [
                'name' => 'Metahemoglobinemia adquirida',
            ],
            [
                'name' => 'Metaplasia mielocitoide agnógena',
            ],
            [
                'name' => 'Metaplasia mieloide',
            ],
            [
                'name' => 'Mielofibrosis',
            ],
            [
                'name' => 'Mielofibrosis idiopática',
            ],
            [
                'name' => 'Mielofibrosis primaria',
            ],
            [
                'name' => 'Mieloma de células plasmáticas',
            ],
            [
                'name' => 'Mieloma múltiple',
            ],
            [
                'name' => 'Neutropenia',
            ],
            [
                'name' => 'Neutropenia en los bebés',
            ],
            [
                'name' => 'Niveles bajos de magnesio',
            ],
            [
                'name' => 'Obstrucción linfática',
            ],
            [
                'name' => 'Paludismo terciano',
            ],
            [
                'name' => 'PCH',
            ],
            [
                'name' => 'Pérdida de potasio',
            ],
            [
                'name' => 'Peste de Pahvant Valley',
            ],
            [
                'name' => 'Peste pulmonar',
            ],
            [
                'name' => 'Peste septicémica',
            ],
            [
                'name' => 'Plasmacitoma del hueso',
            ],
            [
                'name' => 'Plasmacitoma maligno',
            ],
            [
                'name' => 'Plasmodio',
            ],
            [
                'name' => 'Policitemia con cianosis crónica=> policitemia mielopática',
            ],
            [
                'name' => 'Policitemia criptógena',
            ],
            [
                'name' => 'Policitemia esplenomegálica',
            ],
            [
                'name' => 'Policitemia primaria',
            ],
            [
                'name' => 'Policromatofilia',
            ],
            [
                'name' => 'PTI',
            ],
            [
                'name' => 'Púrpura trombocitopénica idiopática (ITP)',
            ],
            [
                'name' => 'Púrpura trombocitopénica inmunitaria',
            ],
            [
                'name' => 'Púrpura vascular',
            ],
            [
                'name' => 'Reacción a una transfusión',
            ],
            [
                'name' => 'Reacción a una transfusión de sangre',
            ],
            [
                'name' => 'Reacción leucemoide',
            ],
            [
                'name' => 'Sangrado por deficiencia de vitamina K',
            ],
            [
                'name' => 'SCD',
            ],
            [
                'name' => 'Sensibilidad autoeritrocítica',
            ],
            [
                'name' => 'Septicemia meningocócica',
            ],
            [
                'name' => 'Síndrome de Arias (Crigler-Najjar tipo II)',
            ],
            [
                'name' => 'Síndrome de Bernard-Soulier',
            ],
            [
                'name' => 'Síndrome de Crigler-Najjar',
            ],
            [
                'name' => 'Síndrome de Felty',
            ],
            [
                'name' => 'Síndrome de Loeffler',
            ],
            [
                'name' => 'Síndrome de los ganglios linfáticos mucocutáneos',
            ],
            [
                'name' => 'Síndrome de quilomicronemia',
            ],
            [
                'name' => 'Síndrome pos-esplenectomía',
            ],
            [
                'name' => 'Talasemia',
            ],
            [
                'name' => 'Toxemia menigocócica',
            ],
            [
                'name' => 'Trastorno mieloproliferativo',
            ],
            [
                'name' => 'Trastornos adquiridos de la función plaquetaria',
            ],
            [
                'name' => 'Trastornos hemorrágicos',
            ],
            [
                'name' => 'Trastornos plaquetarios cualitativos adquiridos',
            ],
            [
                'name' => 'Trombastenia',
            ],
            [
                'name' => 'Trombastenia de Glanzmann',
            ],
            [
                'name' => 'Trombocitopenia',
            ],
            [
                'name' => 'Trombocitopenia inmunitaria inducida por medicamentos',
            ],
            [
                'name' => 'Trombocitopenia no inmunitaria inducida por fármacos',
            ],
            [
                'name' => 'VKDB',
            ],
            [
                'name' => 'Angustia',
            ],
            [
                'name' => 'Drogadicción',
            ],
            [
                'name' => 'Migraña',
            ],
            [
                'name' => 'Amigdalitis',
            ],
            [
                'name' => 'Aspergilosis',
            ],
            [
                'name' => 'Balanopostitis',
            ],
            [
                'name' => 'Brucelosis',
            ],
            [
                'name' => 'Cistitis en niños',
            ],
            [
                'name' => 'Criptococosis',
            ],
            [
                'name' => 'Dengue',
            ],
            [
                'name' => 'Enfermedad de Chagas',
            ],
            [
                'name' => 'Enfermedad de Lyme',
            ],
            [
                'name' => 'Enfermedad de Lyme en etapa 2',
            ],
            [
                'name' => 'Enfermedad de Lyme persistente y tardía',
            ],
            [
                'name' => 'Enfermedad de Lyme terciaria',
            ],
            [
                'name' => 'Enfermedad similar al dengue',
            ],
            [
                'name' => 'Escarlatina',
            ],
            [
                'name' => 'Faringitis',
            ],
            [
                'name' => 'Fiebre por mordedura de rata',
            ],
            [
                'name' => 'Fiebre reumática',
            ],
            [
                'name' => 'Fiebre tifoidea',
            ],
            [
                'name' => 'Giardiasis',
            ],
            [
                'name' => 'Gonorrea',
            ],
            [
                'name' => 'Hidatidosis',
            ],
            [
                'name' => 'HIV/SIDA',
            ],
            [
                'name' => 'Infección aguda de las vías urinarias (IVU aguda)',
            ],
            [
                'name' => 'Infección aguda por VIH',
            ],
            [
                'name' => 'Infección complicada de las vías urinarias',
            ],
            [
                'name' => 'Infección de garganta por estreptococos',
            ],
            [
                'name' => 'Infección de las vías urinarias (IVU) en adultos',
            ],
            [
                'name' => 'Infección del Tracto Urinario (ITU)',
            ],
            [
                'name' => 'Infección por rotavirus',
            ],
            [
                'name' => 'Infección por VIH',
            ],
            [
                'name' => 'Influenza',
            ],
            [
                'name' => 'Intoxicación alimentaria',
            ],
            [
                'name' => 'Linfadenitis',
            ],
            [
                'name' => 'Meningitis',
            ],
            [
                'name' => 'Meningitis tuberculosa',
            ],
            [
                'name' => 'Mononucleosis',
            ],
            [
                'name' => 'Neumonía',
            ],
            [
                'name' => 'Neumonía por citomegalovirus',
            ],
            [
                'name' => 'Osteomielitis',
            ],
            [
                'name' => 'Paludismo o malaria por Falciparum',
            ],
            [
                'name' => 'Paperas',
            ],
            [
                'name' => 'Parasitosis',
            ],
            [
                'name' => 'Peste',
            ],
            [
                'name' => 'Poliomielitis',
            ],
            [
                'name' => 'Rickettsiosis exantemática',
            ],
            [
                'name' => 'Sepsis',
            ],
            [
                'name' => 'Sífilis',
            ],
            [
                'name' => 'Sífilis terciaria',
            ],
            [
                'name' => 'Síndrome de seroconversión por VIH',
            ],
            [
                'name' => 'Staphylococcus aureus resistente a meticilina',
            ],
            [
                'name' => 'Tétanos',
            ],
            [
                'name' => 'Tifus',
            ],
            [
                'name' => 'Tuberculosis',
            ],
            [
                'name' => 'Tuberculosis diseminada',
            ],
            [
                'name' => 'Tuberculosis pulmonar',
            ],
            [
                'name' => 'Úlcera aftosa',
            ],
            [
                'name' => 'Varicela',
            ],
            [
                'name' => 'Viruela',
            ],
            [
                'name' => 'Virus del Nilo Occidental',
            ],
            [
                'name' => 'Agammaglobulinemia',
            ],
            [
                'name' => 'Agammaglobulinemia de Bruton',
            ],
            [
                'name' => 'Agammaglobulinemia ligada al cromosoma X',
            ],
            [
                'name' => 'Angioedema hereditario',
            ],
            [
                'name' => 'Artritis séptica',
            ],
            [
                'name' => 'CIDP',
            ],
            [
                'name' => 'Citomegalovirus congénito',
            ],
            [
                'name' => 'Deficiencia de IgA',
            ],
            [
                'name' => 'Deficiencia selectiva de lgA',
            ],
            [
                'name' => 'Edema angioneurótico',
            ],
            [
                'name' => 'ELA',
            ],
            [
                'name' => 'Enfermedad de Quincke',
            ],
            [
                'name' => 'Enfermedad de Still del adulto',
            ],
            [
                'name' => 'Enfermedad del suero',
            ],
            [
                'name' => 'Enfermedad granulomatosa crónica',
            ],
            [
                'name' => 'Enfermedad granulomatosa crónica de la infancia',
            ],
            [
                'name' => 'Enfermedad por anticuerpos contra la membrana basal glomerular',
            ],
            [
                'name' => 'Glomerulonefritis membranoproliferativa (tipo I)',
            ],
            [
                'name' => 'Glomerulonefritis membranoproliferativa (tipo II)',
            ],
            [
                'name' => 'Glomerulonefritis rápidamente progresiva',
            ],
            [
                'name' => 'Glomerulonefritis rápidamente progresiva con hemorragia pulmonar',
            ],
            [
                'name' => 'Granulomatosis de Wegener',
            ],
            [
                'name' => 'Hemorragia pulmonar por glomerulonefritis',
            ],
            [
                'name' => 'Hiperinmunización',
            ],
            [
                'name' => 'Infección por VIH sintomática y crónica',
            ],
            [
                'name' => 'Infección por VIH sintomática y temprana',
            ],
            [
                'name' => 'Inmunodepresión',
            ],
            [
                'name' => 'Leucemia linfocítica aguda',
            ],
            [
                'name' => 'Leucoencefalopatía multifocal progresiva',
            ],
            [
                'name' => 'LMP',
            ],
            [
                'name' => 'Miastenia grave',
            ],
            [
                'name' => 'Mononucleosis por CMV',
            ],
            [
                'name' => 'Neumocistosis',
            ],
            [
                'name' => 'Neumonía por Pneumocystis carinii',
            ],
            [
                'name' => 'Neumonía viral',
            ],
            [
                'name' => 'Nocardiosis del pulmón',
            ],
            [
                'name' => 'Pars planitis',
            ],
            [
                'name' => 'PCP',
            ],
            [
                'name' => 'PML',
            ],
            [
                'name' => 'Poliartritis crónica juvenil',
            ],
            [
                'name' => 'Polineuritis infecciosa',
            ],
            [
                'name' => 'Polineuropatía desmielinizante inflamatoria crónica',
            ],
            [
                'name' => 'Polineuropatía inflamatoria aguda',
            ],
            [
                'name' => 'Rechazo a un órgano o tejido',
            ],
            [
                'name' => 'Rechazo al injerto',
            ],
            [
                'name' => 'Rubéola congénita',
            ],
            [
                'name' => 'Sífilis secundaria',
            ],
            [
                'name' => 'Síndome de Eaton-Lambert',
            ],
            [
                'name' => 'Síndrome de Chediak-Higashi',
            ],
            [
                'name' => 'Síndrome de Goodpasture',
            ],
            [
                'name' => 'Síndrome de hiper IgE',
            ],
            [
                'name' => 'Síndrome de Lambert-Eaton',
            ],
            [
                'name' => 'Síndrome de respuesta inflamatoria sistémica (SRIS)',
            ],
            [
                'name' => 'Síndrome miasténico',
            ],
            [
                'name' => 'Síndrome renal pulmonar',
            ],
            [
                'name' => 'Síndrome retroviral agudo',
            ],
            [
                'name' => 'Toxoplasmosis',
            ],
            [
                'name' => 'Trastornos autoinmunitarios',
            ],
            [
                'name' => 'Uveítis anterior',
            ],
            [
                'name' => 'Uveítis posterior',
            ],
            [
                'name' => 'Virus de la hepatitis D',
            ],
            [
                'name' => 'Acidemia metilmalónica',
            ],
            [
                'name' => 'Adenitis tuberculosa',
            ],
            [
                'name' => 'Deficiencia de vitamina D',
            ],
            [
                'name' => 'Enfermedad del arañazo de gato',
            ],
            [
                'name' => 'Estreptobacilosis',
            ],
            [
                'name' => 'Estudios de laboratorio general',
            ],
            [
                'name' => 'Fibrosis pulmonar intersticial difusa idiopática',
            ],
            [
                'name' => 'Fiebre causada por una variedad de tábano',
            ],
            [
                'name' => 'Fiebre de Haverhill',
            ],
            [
                'name' => 'Fiebre de los conejos',
            ],
            [
                'name' => 'Fiebre de los lemming o ratones de Noruega',
            ],
            [
                'name' => 'Fiebre espirilar',
            ],
            [
                'name' => 'Fiebre estreptobacilar',
            ],
            [
                'name' => 'FPI',
            ],
            [
                'name' => 'Glomeruloesclerosis diabética',
            ],
            [
                'name' => 'Glomeruloesclerosis segmentaria',
            ],
            [
                'name' => 'Glomerulonefritis (GN) posestreptocócica',
            ],
            [
                'name' => 'Glomerulonefritis (GN) postinfecciosa',
            ],
            [
                'name' => 'Glomerulonefritis extramembranosa',
            ],
            [
                'name' => 'Glomerulonefritis lobular',
            ],
            [
                'name' => 'Glomerulonefritis membranosa',
            ],
            [
                'name' => 'Glomerulonefritis postestreptocócica',
            ],
            [
                'name' => 'Hiperbilirrubinemia crónica leve',
            ],
            [
                'name' => 'Hiperbilirrubinemia familiar transitoria',
            ],
            [
                'name' => 'Hiperlipidemia combinada familiar',
            ],
            [
                'name' => 'Hiperlipidemia tipo lipoproteína múltiple',
            ],
            [
                'name' => 'Hipervitaminosis D',
            ],
            [
                'name' => 'Histiocitosis',
            ],
            [
                'name' => 'Histiocitosis de las células de Langerhans',
            ],
            [
                'name' => 'Histiocitosis X',
            ],
            [
                'name' => 'Histiocitosis X pulmonar',
            ],
            [
                'name' => 'Ictericia juvenil intermitente',
            ],
            [
                'name' => 'Infección del riñón',
            ],
            [
                'name' => 'Infección recurrente de las vías urinarias',
            ],
            [
                'name' => 'Intoxicación por mercurio',
            ],
            [
                'name' => 'Mosaicismo',
            ],
            [
                'name' => 'Mosaicismo cromosómico',
            ],
            [
                'name' => 'Mosaicismo gonadal',
            ],
            [
                'name' => 'MRSA extrahospitalaria (CA-MRSA)',
            ],
            [
                'name' => 'MRSA intrahospitalaria (HA-MRSA)',
            ],
            [
                'name' => 'MSUD',
            ],
            [
                'name' => 'Nefritis intersticial aguda no relacionada con AINES',
            ],
            [
                'name' => 'Nefritis tubulointersticial',
            ],
            [
                'name' => 'Obstrucción de las vías urinarias bajas',
            ],
            [
                'name' => 'Parálisis hipercaliémica periódica',
            ],
            [
                'name' => 'Potasio bajo en la sangre',
            ],
            [
                'name' => 'Potasio elevado',
            ],
            [
                'name' => 'Reticuloendoteliosis no lipídica',
            ],
            [
                'name' => 'Síndrome de Gilbert',
            ],
            [
                'name' => 'Síndrome de Lucey-Driscol',
            ],
            [
                'name' => 'Síndrome de nefritis aguda',
            ],
            [
                'name' => 'Síndrome del cabello ensortijado de Menkes',
            ],
            [
                'name' => 'Síndrome nefrítico agudo',
            ],
            [
                'name' => 'Sodoku',
            ],
            [
                'name' => 'Toxicidad de la vitamina A',
            ],
            [
                'name' => 'Toxicidad por vitamina D',
            ],
            [
                'name' => 'Tularemia',
            ],
            [
                'name' => 'Afasia',
            ],
            [
                'name' => 'Deficiencia articulatoria',
            ],
            [
                'name' => 'Dislexia',
            ],
            [
                'name' => 'Dispraxia',
            ],
            [
                'name' => 'El tartamudeo y los niños',
            ],
            [
                'name' => 'Falta de fluidez en el lenguaje',
            ],
            [
                'name' => 'Pérdida de la audición a causa del trabajo',
            ],
            [
                'name' => 'Síndrome de 5p menos',
            ],
            [
                'name' => 'Síndrome de Heller',
            ],
            [
                'name' => 'Síndrome de Martin-Bell',
            ],
            [
                'name' => 'Síndrome de Rett',
            ],
            [
                'name' => 'Síndrome de Rubinstein',
            ],
            [
                'name' => 'Síndrome de Rubinstein-Taybi',
            ],
            [
                'name' => 'Síndrome de supresión del cromosoma 5p',
            ],
            [
                'name' => 'Síndrome del cromosoma X frágil',
            ],
            [
                'name' => 'Síndrome del marcador X',
            ],
            [
                'name' => 'Trastorno del desarrollo de la lectura',
            ],
            [
                'name' => 'Trastorno del desarrollo del lenguaje expresivo',
            ],
            [
                'name' => 'Trastorno disociativo de la infancia',
            ],
            [
                'name' => 'Trastorno fonológico',
            ],
            [
                'name' => 'Artritis',
            ],
            [
                'name' => 'Celotipia',
            ],
            [
                'name' => 'Condromalacia rotuliana',
            ],
            [
                'name' => 'Depresión',
            ],
            [
                'name' => 'Disfunción eréctil',
            ],
            [
                'name' => 'Duelo',
            ],
            [
                'name' => 'Espondilolistesis',
            ],
            [
                'name' => 'Estrés postraumático',
            ],
            [
                'name' => 'Lesión de Manguito Rotador',
            ],
            [
                'name' => 'Lumbalgia',
            ],
            [
                'name' => 'Pesadillas constantes',
            ],
            [
                'name' => 'Síndrome de burnout',
            ],
            [
                'name' => 'Síndrome del túnel carpiano',
            ],
            [
                'name' => 'Trastorno de ansiedad generalizada',
            ],
            [
                'name' => 'Trastorno obsesivo compulsivo (TOC)',
            ],
            [
                'name' => 'Trastornos del sueño',
            ],
            [
                'name' => 'Acidosis respiratoria',
            ],
            [
                'name' => 'Aprosencefalia con cráneo abierto',
            ],
            [
                'name' => 'Beriberi',
            ],
            [
                'name' => 'Botulismo infantil',
            ],
            [
                'name' => 'Cetoacidosis alcohólica',
            ],
            [
                'name' => 'Dengue hemorrágico',
            ],
            [
                'name' => 'Dolor de cabeza',
            ],
            [
                'name' => 'Encefalopatía hipóxica',
            ],
            [
                'name' => 'Envenenamiento con etilenglicol',
            ],
            [
                'name' => 'Fenotipo de Potter',
            ],
            [
                'name' => 'Incremento de la presión intracraneal',
            ],
            [
                'name' => 'Lesión pulmonar aguda',
            ],
            [
                'name' => 'Lesión tóxica del riñón',
            ],
            [
                'name' => 'Muerte cerebral',
            ],
            [
                'name' => 'Neumonía asociada con el uso de un respirador',
            ],
            [
                'name' => 'Parálisis general',
            ],
            [
                'name' => 'PIC',
            ],
            [
                'name' => 'Pielonefritis',
            ],
            [
                'name' => 'Prematuro',
            ],
            [
                'name' => 'Pulmón en shock',
            ],
            [
                'name' => 'SAM',
            ],
            [
                'name' => 'SDR transitorio',
            ],
            [
                'name' => 'SDRA',
            ],
            [
                'name' => 'Shock séptico',
            ],
            [
                'name' => 'Síndrome carcinoide',
            ],
            [
                'name' => 'Síndrome de aspiracion de meconio',
            ],
            [
                'name' => 'Síndrome de dificultad respiratoria aguda',
            ],
            [
                'name' => 'Síndrome de Potter',
            ],
            [
                'name' => 'Síndrome de Reye',
            ],
            [
                'name' => 'Síndrome respiratorio agudo severo (SARS)',
            ],
            [
                'name' => 'Traqueomalacia congénita',
            ],
            [
                'name' => 'Traqueomalacia tipo 1',
            ],
            [
                'name' => 'Traqueomalacia tipo 2',
            ],
            [
                'name' => 'Traqueomalacia tipo 3',
            ],
            [
                'name' => 'Contracturas musculares',
            ],
            [
                'name' => 'Dolor en la espalda',
            ],
            [
                'name' => 'Fractura de antebrazo',
            ],
            [
                'name' => 'Fractura de clavícula',
            ],
            [
                'name' => 'Fractura de fémur',
            ],
            [
                'name' => 'Fractura de mano',
            ],
            [
                'name' => 'Fractura de muñeca',
            ],
            [
                'name' => 'Fractura de tobillo y pie',
            ],
            [
                'name' => 'Hematoma septal',
            ],
            [
                'name' => 'Hombro de nadador',
            ],
            [
                'name' => 'Hombro de tenista',
            ],
            [
                'name' => 'Lesiones ligamentarias en mano y muñeca',
            ],
            [
                'name' => 'Mal de la montaña',
            ],
            [
                'name' => 'Miítis',
            ],
            [
                'name' => 'Pie equino varo',
            ],
            [
                'name' => 'Pie plano',
            ],
            [
                'name' => 'Síndrome femororrotuliano',
            ],
            [
                'name' => 'Tenosinovitis',
            ],
            [
                'name' => 'Derrame pleural relacionado con el asbesto',
            ],
            [
                'name' => 'Fibrosis pulmonar por exposición al asbesto',
            ],
            [
                'name' => 'Fiebre de los pantanos',
            ],
            [
                'name' => 'Hematoma epidural',
            ],
            [
                'name' => 'Hematoma extradural',
            ],
            [
                'name' => 'Hematoma subdural crónico',
            ],
            [
                'name' => 'Hemorragia extradural',
            ],
            [
                'name' => 'Hemorragia subdural',
            ],
            [
                'name' => 'Hemorragia subdural crónica',
            ],
            [
                'name' => 'Lesión de oído',
            ],
            [
                'name' => 'Neumoconiosis de los mineros del carbón',
            ],
            [
                'name' => 'Neumoconiosis reumatoidea',
            ],
            [
                'name' => 'Neumonía por hidrocarburos',
            ],
            [
                'name' => 'Neumonitis intersticial por exposición al asbesto',
            ],
            [
                'name' => 'Neumonitis por hipersensibilidad',
            ],
            [
                'name' => 'Neumopatía por humidificador o aire acondicionado',
            ],
            [
                'name' => 'Pneumoconiosis',
            ],
            [
                'name' => 'Psitacosis',
            ],
            [
                'name' => 'Silicoproteinosis',
            ],
            [
                'name' => 'Silicosis acelerada',
            ],
            [
                'name' => 'Silicosis aguda',
            ],
            [
                'name' => 'Silicosis conglomerada',
            ],
            [
                'name' => 'Silicosis crónica',
            ],
            [
                'name' => 'Síndrome de Caplan',
            ],
            [
                'name' => 'Asimetría facial',
            ],
            [
                'name' => 'Envejecimiento cutáneo',
            ],
            [
                'name' => 'Fiebre mediterránea familiar',
            ],
            [
                'name' => 'Gripe aviar o aviaria',
            ],
            [
                'name' => 'H5N1',
            ],
            [
                'name' => 'Hidrocefalia comunicante',
            ],
            [
                'name' => 'Hidrocefalia obstructiva extraventricular',
            ],
            [
                'name' => 'Hipercinesia en la niñez',
            ],
            [
                'name' => 'Hipocondría',
            ],
            [
                'name' => 'Hipoventilación alveolar primaria',
            ],
            [
                'name' => 'Influenza aviaria',
            ],
            [
                'name' => 'Kuru',
            ],
            [
                'name' => 'Nefritis hereditaria',
            ],
            [
                'name' => 'Nefritis intersticial aguda (alérgica)',
            ],
            [
                'name' => 'Piojos del cuerpo',
            ],
            [
                'name' => 'Reducción de grasa (adiposidades)',
            ],
            [
                'name' => 'Retraso del desarrollo inorgánico',
            ],
            [
                'name' => 'Rigidez',
            ],
            [
                'name' => 'Rítides facial',
            ],
            [
                'name' => 'Secuelas de parálisis facial',
            ],
            [
                'name' => 'Síndrome de Aarskog',
            ],
            [
                'name' => 'Síndrome de Alport',
            ],
            [
                'name' => 'Síndrome de Beckwith-Wiedemann',
            ],
            [
                'name' => 'Síndrome de Munchausen por poderes',
            ],
            [
                'name' => 'Síndrome de Noonan',
            ],
            [
                'name' => 'Síndrome uretral',
            ],
            [
                'name' => 'Síndrome uretral agudo',
            ],
            [
                'name' => 'TEPT',
            ],
            [
                'name' => 'Terror nocturno',
            ],
            [
                'name' => 'Tiña ungueal',
            ],
            [
                'name' => 'Trastorno crónico de tic motor',
            ],
            [
                'name' => 'Trastorno crónico de tic vocal',
            ],
            [
                'name' => 'Trastorno de terror durante el sueño',
            ],
            [
                'name' => 'Trastorno del desarrollo de la coordinación',
            ],
            [
                'name' => 'Balanitis',
            ],
            [
                'name' => 'Deseo sexual hiperactivo',
            ],
            [
                'name' => 'Hipercolesterolemia',
            ],
            [
                'name' => 'Infección urinaria complicada',
            ],
            [
                'name' => 'Liendres',
            ],
            [
                'name' => 'Linfadenopatía localizada',
            ],
            [
                'name' => 'Nefropatía debida al reflujo',
            ],
            [
                'name' => 'Pérdida de memoria',
            ],
            [
                'name' => 'Piernas en O',
            ],
            [
                'name' => 'Polineuropatía sensitivomotora',
            ],
            [
                'name' => 'Síndrome de sueño y vigilia irregulares',
            ],
            [
                'name' => 'Sinusitis aguda',
            ],
            [
                'name' => 'Abstinencia de nicotina',
            ],
            [
                'name' => 'Adicciones',
            ],
            [
                'name' => 'Agorafobia',
            ],
            [
                'name' => 'Alcalosis respiratoria',
            ],
            [
                'name' => 'Anafilaxia',
            ],
            [
                'name' => 'Anomalía hereditaria del ciclo de la urea',
            ],
            [
                'name' => 'Anoxia por altitud',
            ],
            [
                'name' => 'Artritis gotosa aguda',
            ],
            [
                'name' => 'Artritis reactiva',
            ],
            [
                'name' => 'Artritis reumatoide',
            ],
            [
                'name' => 'Baja producción de leche materna',
            ],
            [
                'name' => 'Bajo nivel de calcio en los bebés',
            ],
            [
                'name' => 'Bronquitis obstructiva',
            ],
            [
                'name' => 'Calambres',
            ],
            [
                'name' => 'Cáncer de cabeza y cuello',
            ],
            [
                'name' => 'Candidiasis en pezones',
            ],
            [
                'name' => 'Cefalea en brotes',
            ],
            [
                'name' => 'Cefalea tensional',
            ],
            [
                'name' => 'Cistitis aguda',
            ],
            [
                'name' => 'Cistitis recurrente',
            ],
            [
                'name' => 'Conductos lactíferos obstruidos',
            ],
            [
                'name' => 'Dehiscencia quirúrgica',
            ],
            [
                'name' => 'Desequilibrio hormonal',
            ],
            [
                'name' => 'Desgaste de cadera',
            ],
            [
                'name' => 'Desgaste de rodilla',
            ],
            [
                'name' => 'Desnutrición',
            ],
            [
                'name' => 'Diarrea aguda con deshidratación',
            ],
            [
                'name' => 'Discinesia tardía',
            ],
            [
                'name' => 'Disfonía espasmódica',
            ],
            [
                'name' => 'Disfunción de la trompa de Eustaquio',
            ],
            [
                'name' => 'Dolor al amamantar',
            ],
            [
                'name' => 'Dolor de cabeza benigno',
            ],
            [
                'name' => 'Dolor de muelas',
            ],
            [
                'name' => 'Elangiectasia',
            ],
            [
                'name' => 'Enfermedad del sueño',
            ],
            [
                'name' => 'Enfermedad pulmonar parenquimatosa difusa',
            ],
            [
                'name' => 'Esclerosis sistémica',
            ],
            [
                'name' => 'Escoliosis',
            ],
            [
                'name' => 'Escorbuto',
            ],
            [
                'name' => 'Espasmo muscular',
            ],
            [
                'name' => 'Esquizofrenia',
            ],
            [
                'name' => 'Estado de abstinencia alcohólica',
            ],
            [
                'name' => 'Estallido del oído',
            ],
            [
                'name' => 'Estomatitis ulcerativa',
            ],
            [
                'name' => 'Etmoiditis',
            ],
            [
                'name' => 'Eyaculación retrógrada',
            ],
            [
                'name' => 'Faringitis bacteriana',
            ],
            [
                'name' => 'Fenómeno de Raynaud',
            ],
            [
                'name' => 'Fibrosis pulmonar idiopática',
            ],
            [
                'name' => 'Fiebre de Malta',
            ],
            [
                'name' => 'Fiebre de origen desconocido',
            ],
            [
                'name' => 'Fiebre recurrente',
            ],
            [
                'name' => 'Fobia social',
            ],
            [
                'name' => 'Gota crónica',
            ],
            [
                'name' => 'Herpangina',
            ],
            [
                'name' => 'Hiperreflexia del detrusor',
            ],
            [
                'name' => 'Hipersomnia idiopática',
            ],
            [
                'name' => 'Hipoacusia ocupacional',
            ],
            [
                'name' => 'Hiponatremia',
            ],
            [
                'name' => 'Hipotensión ortostática',
            ],
            [
                'name' => 'Hipotermia',
            ],
            [
                'name' => 'Ictericia por la leche materna',
            ],
            [
                'name' => 'Impactación del oído',
            ],
            [
                'name' => 'Inclusión dentaria',
            ],
            [
                'name' => 'Incontinencia imperiosa',
            ],
            [
                'name' => 'Inestabilidad del detrusor',
            ],
            [
                'name' => 'Infección asintomática del oído',
            ],
            [
                'name' => 'Infección de las vías urinarias asociada con el uso de catéteres',
            ],
            [
                'name' => 'Infección de los testículos',
            ],
            [
                'name' => 'Infección del espacio sublingual',
            ],
            [
                'name' => 'Infección del espacio submandibular',
            ],
            [
                'name' => 'Infección del oído',
            ],
            [
                'name' => 'Infección lingual',
            ],
            [
                'name' => 'Infección no complicada de las vías urinarias',
            ],
            [
                'name' => 'Infección renal',
            ],
            [
                'name' => 'Infección sinusal',
            ],
            [
                'name' => 'Infección sinusal crónica',
            ],
            [
                'name' => 'Infección urinaria baja',
            ],
            [
                'name' => 'Infección vesical en adultos',
            ],
            [
                'name' => 'Infección viral de las vías respiratorias altas',
            ],
            [
                'name' => 'Infiltrados pulmonares con eosinofilia',
            ],
            [
                'name' => 'Inflamación de la conjuntiva',
            ],
            [
                'name' => 'Inflamación de la esclerótica',
            ],
            [
                'name' => 'Inflamación de las articulaciones',
            ],
            [
                'name' => 'Inflamación de los bronquios',
            ],
            [
                'name' => 'Ingurgitación mamaria',
            ],
            [
                'name' => 'Insuficiencia crónica del riñón',
            ],
            [
                'name' => 'Insuficiencia respiratoria',
            ],
            [
                'name' => 'Insuficiencia ventilatoria',
            ],
            [
                'name' => 'Intoxicación por arsénico',
            ],
            [
                'name' => 'Intoxicación por opiáceos',
            ],
            [
                'name' => 'Intoxicación por plaguicidas',
            ],
            [
                'name' => 'ITU asociada con el uso de catéter',
            ],
            [
                'name' => 'Jaqueca',
            ],
            [
                'name' => 'Laberintitis bacteriana',
            ],
            [
                'name' => 'Laringitis',
            ],
            [
                'name' => 'Lesión en el oído interno',
            ],
            [
                'name' => 'Lesión traumática de la vejiga y la uretra',
            ],
            [
                'name' => 'Linfangioma',
            ],
            [
                'name' => 'Lipogranuloma de la glándula de Meibomio',
            ],
            [
                'name' => 'Litiasis renal',
            ],
            [
                'name' => 'Loxia',
            ],
            [
                'name' => 'Lupus',
            ],
            [
                'name' => 'Macroamilasemia',
            ],
            [
                'name' => 'Maneto',
            ],
            [
                'name' => 'Masa',
            ],
            [
                'name' => 'Metatarso aducido',
            ],
            [
                'name' => 'Metatarso varo',
            ],
            [
                'name' => 'Mioclonía nocturna',
            ],
            [
                'name' => 'Mioclono palatino',
            ],
            [
                'name' => 'Miotonía congénita',
            ],
            [
                'name' => 'Miringitis ampollar',
            ],
            [
                'name' => 'Miringitis infecciosa',
            ],
            [
                'name' => 'Mononeurapatía por compresión del III par craneal',
            ],
            [
                'name' => 'Mononeuritis múltiple',
            ],
            [
                'name' => 'Mononeuropatía',
            ],
            [
                'name' => 'Mononeuropatía del IX par craneal o nervio glosofaríngeo',
            ],
            [
                'name' => 'Mononeuropatía del VI par craneal',
            ],
            [
                'name' => 'Mononeuropatía del VII par craneal',
            ],
            [
                'name' => 'Mononeuropatía múltiple',
            ],
            [
                'name' => 'Monorquidia',
            ],
            [
                'name' => 'Neuralgia',
            ],
            [
                'name' => 'Neuralgia del trigémino',
            ],
            [
                'name' => 'Neuritis de tipo periférico',
            ],
            [
                'name' => 'Neuropatía (Diabética,Herpes y Zoster)',
            ],
            [
                'name' => 'Neuropatía alcohólica',
            ],
            [
                'name' => 'Neuropatía del nervio axilar',
            ],
            [
                'name' => 'Neuropatía del nervio cubital',
            ],
            [
                'name' => 'Neuropatía del nervio femoral',
            ],
            [
                'name' => 'Neuropatía del nervio peroneo común',
            ],
            [
                'name' => 'Neuropatía del nervio tibial',
            ],
            [
                'name' => 'Neuropatía del plexo braquial',
            ],
            [
                'name' => 'Neuropatía facial',
            ],
            [
                'name' => 'Neuropatía hereditaria del peroneo',
            ],
            [
                'name' => 'Neuropatía secundaria a medicamentos',
            ],
            [
                'name' => 'Neuropatía sensorial y autónoma hereditaria tipo III (HSAN III)',
            ],
            [
                'name' => 'Next Tabletas',
            ],
            [
                'name' => 'Nivel bajo de fósforo',
            ],
            [
                'name' => 'Nivel bajo de potasio',
            ],
            [
                'name' => 'Nódulo pulmonar solitario',
            ],
            [
                'name' => 'Obstrucción de la salida de la vejiga',
            ],
            [
                'name' => 'Ocena',
            ],
            [
                'name' => 'Oído de nadador',
            ],
            [
                'name' => 'Osteoartritis',
            ],
            [
                'name' => 'Osteoartrosis',
            ],
            [
                'name' => 'Osteoma',
            ],
            [
                'name' => 'Osteomielitis del cráneo',
            ],
            [
                'name' => 'Otitis externa crónica',
            ],
            [
                'name' => 'Otitis externa maligna',
            ],
            [
                'name' => 'Otitis media adhesiva',
            ],
            [
                'name' => 'Parainfluenza',
            ],
            [
                'name' => 'Parálisis del nervio peroneo',
            ],
            [
                'name' => 'Parálisis del nervio radial',
            ],
            [
                'name' => 'Parálisis del recto lateral',
            ],
            [
                'name' => 'Permeabilidad de la trompa de Eustaquio',
            ],
            [
                'name' => 'Pica',
            ],
            [
                'name' => 'Pielonefritis atrófica crónica',
            ],
            [
                'name' => 'Plexopatía braquial',
            ],
            [
                'name' => 'Prostatitis crónica',
            ],
            [
                'name' => 'Proteinosis alveolar pulmonar',
            ],
            [
                'name' => 'Queilitis angular',
            ],
            [
                'name' => 'Queratitis seca',
            ],
            [
                'name' => 'Queratoconjuntivitis seca',
            ],
            [
                'name' => 'Queratosis del fumador',
            ],
            [
                'name' => 'Rabia',
            ],
            [
                'name' => 'Reflujo uretral',
            ],
            [
                'name' => 'Rinitis idiopática',
            ],
            [
                'name' => 'Ruptura del tímpano',
            ],
            [
                'name' => 'Sialoadenitis',
            ],
            [
                'name' => 'Sialolitiasis',
            ],
            [
                'name' => 'Síndrome de apnea obstructiva del sueño',
            ],
            [
                'name' => 'Síndrome de las piernas inquietas',
            ],
            [
                'name' => 'Síndrome de Parinaud',
            ],
            [
                'name' => 'Síndrome de Parkinson plus',
            ],
            [
                'name' => 'Síndrome de Parsonage-Turner',
            ],
            [
                'name' => 'Síndrome de Richardson-Steele-Olszewski',
            ],
            [
                'name' => 'Síndrome de Riley-Day',
            ],
            [
                'name' => 'Síndrome inflamatorio orbital idiopático (IOIS, por sus siglas en inglés)',
            ],
            [
                'name' => 'Síndrome oculoglandular',
            ],
            [
                'name' => 'Sinusitis',
            ],
            [
                'name' => 'Sonambulismo',
            ],
            [
                'name' => 'Tabaquismo',
            ],
            [
                'name' => 'Tapón de cerumen',
            ],
            [
                'name' => 'Tendinitis aquílea',
            ],
            [
                'name' => 'Tendinitis calcificada',
            ],
            [
                'name' => 'Tendinitis del talón',
            ],
            [
                'name' => 'Tic doloroso',
            ],
            [
                'name' => 'Tifus endémico',
            ],
            [
                'name' => 'Tifus epidémico',
            ],
            [
                'name' => 'Tifus exantemático',
            ],
            [
                'name' => 'Tifus murino',
            ],
            [
                'name' => 'Tímpano perforado',
            ],
            [
                'name' => 'Tirón en el codo',
            ],
            [
                'name' => 'Tortícolis',
            ],
            [
                'name' => 'Traqueítis bacteriana',
            ],
            [
                'name' => 'Trastorno de dolor',
            ],
            [
                'name' => 'Trastorno de dolor somatomorfo',
            ],
            [
                'name' => 'Trastorno de hiperactividad y déficit de atención (TDAH)',
            ],
            [
                'name' => 'Trastorno de tic transitorio',
            ],
            [
                'name' => 'Trastornos del metabolismo de los minerales',
            ],
            [
                'name' => 'Trastornos renales y urológicos',
            ],
            [
                'name' => 'Trauma acústico',
            ],
            [
                'name' => 'Trauma en el oído interno',
            ],
            [
                'name' => 'Traumatismo medio de la cara',
            ],
            [
                'name' => 'Trismo',
            ],
            [
                'name' => 'Úlcera labial',
            ],
            [
                'name' => 'Úlceras venosas por estasis',
            ],
            [
                'name' => 'Uvulitis',
            ],
            [
                'name' => 'Varicocele',
            ],
            [
                'name' => 'Variola',
            ],
            [
                'name' => 'Vejiga espasmódica',
            ],
            [
                'name' => 'Vejiga hiperreactiva',
            ],
            [
                'name' => 'Vejiga neurógena',
            ],
            [
                'name' => 'Viruela mayor y menor',
            ],
            [
                'name' => 'Xeroftalmia',
            ],
            [
                'name' => 'Enfermedad sistémica relacionada con inmunoglobulina G4 (IgG4)',
            ],
            [
                'name' => 'Absceso cerebral',
            ],
            [
                'name' => 'Accidente cerebrovascular isquémico',
            ],
            [
                'name' => 'Acidosis',
            ],
            [
                'name' => 'Adenovirus',
            ],
            [
                'name' => 'AGH',
            ],
            [
                'name' => 'Agua en el pulmón',
            ],
            [
                'name' => 'Alcoholismo',
            ],
            [
                'name' => 'Amiloidosis cardíaca',
            ],
            [
                'name' => 'Amiloidosis cerebral',
            ],
            [
                'name' => 'Amiloidosis hereditaria',
            ],
            [
                'name' => 'Amiloidosis primaria',
            ],
            [
                'name' => 'Amiloidosis senil',
            ],
            [
                'name' => 'Anaplasmosis granulocítica humana',
            ],
            [
                'name' => 'Ántrax',
            ],
            [
                'name' => 'Ántrax múltiple',
            ],
            [
                'name' => 'Apnea del sueño',
            ],
            [
                'name' => 'Arteritis craneal',
            ],
            [
                'name' => 'Arteritis de células gigantes',
            ],
            [
                'name' => 'Arteritis de Takayasu',
            ],
            [
                'name' => 'Artritis por gota crónica',
            ],
            [
                'name' => 'Aumento de la presión intracraneal',
            ],
            [
                'name' => 'Bacterias necrosantes',
            ],
            [
                'name' => 'Bacteriemia con sepsis',
            ],
            [
                'name' => 'Bacteriemia gonocócica',
            ],
            [
                'name' => 'Bacteriemia meningocócica',
            ],
            [
                'name' => 'Bartonellosis',
            ],
            [
                'name' => 'Blastomicosis',
            ],
            [
                'name' => 'Bronquitis crónica',
            ],
            [
                'name' => 'Cálculos en el tracto urinario',
            ],
            [
                'name' => 'Cáncer testicular seminoma',
            ],
            [
                'name' => 'Carbunco',
            ],
            [
                'name' => 'Choque hipovolémico',
            ],
            [
                'name' => 'Coccidioidomicosis',
            ],
            [
                'name' => 'Coccidioidomicosis diseminada',
            ],
            [
                'name' => 'Coccidioidomicosis pulmonar aguda',
            ],
            [
                'name' => 'Coccidioidomicosis pulmonar crónica',
            ],
            [
                'name' => 'Coccidioidomicosis sistémica',
            ],
            [
                'name' => 'Complejo relacionado con el SIDA (CRS)',
            ],
            [
                'name' => 'Criohemoglobinuria paroxística',
            ],
            [
                'name' => 'Derrame cerebral hemorrágico',
            ],
            [
                'name' => 'Desequilibrio de líquidos',
            ],
            [
                'name' => 'Dolor mixto',
            ],
            [
                'name' => 'Dolor torácico pleurítico',
            ],
            [
                'name' => 'EAG',
            ],
            [
                'name' => 'EGC',
            ],
            [
                'name' => 'EGH',
            ],
            [
                'name' => 'Ehrlichiosis',
            ],
            [
                'name' => 'Ehrlichiosis granulocítica humana',
            ],
            [
                'name' => 'Ehrlichiosis monocítica humana',
            ],
            [
                'name' => 'Elevación de potasio',
            ],
            [
                'name' => 'EMH',
            ],
            [
                'name' => 'Encefalopatía Alcohólica',
            ],
            [
                'name' => 'Enfermedad de Brill-Zinsser',
            ],
            [
                'name' => 'Enfermedad de Gilchrist',
            ],
            [
                'name' => 'Enfermedad de Hansen',
            ],
            [
                'name' => 'Enfermedad de la Bahía de Minamata',
            ],
            [
                'name' => 'Enfermedad de Lyme crónica y persistente',
            ],
            [
                'name' => 'Enfermedad de Lyme de diseminación temprana',
            ],
            [
                'name' => 'Enfermedad de Lyme primaria',
            ],
            [
                'name' => 'Enfermedad de Ohara',
            ],
            [
                'name' => 'Enfermedad hidatídica',
            ],
            [
                'name' => 'Equinococo',
            ],
            [
                'name' => 'Eritema artrítico epidémico',
            ],
            [
                'name' => 'Esclerosis lateral amiotrófica',
            ],
            [
                'name' => 'Escrófula',
            ],
            [
                'name' => 'Espondilitis anquilosante',
            ],
            [
                'name' => 'Espondilosis cervical',
            ],
            [
                'name' => 'Estado de confusión aguda',
            ],
            [
                'name' => 'Gangrena gaseosa',
            ],
            [
                'name' => 'Glomerulonefritis',
            ],
            [
                'name' => 'Gota aguda',
            ],
            [
                'name' => 'Hematoma del riñón',
            ],
            [
                'name' => 'Hidrocefalia idiopática',
            ],
            [
                'name' => 'Hipercalcemia',
            ],
            [
                'name' => 'Hipervitaminosis A',
            ],
            [
                'name' => 'Infección aguda de la vejiga',
            ],
            [
                'name' => 'Infección urinaria asociada al uso de catéteres',
            ],
            [
                'name' => 'Insuficiencia renal aguda',
            ],
            [
                'name' => 'Lesión del nervio peroneo',
            ],
            [
                'name' => 'Mareos',
            ],
            [
                'name' => 'Mielomeningocele',
            ],
            [
                'name' => 'Nefritis lúpica',
            ],
            [
                'name' => 'Nefrolitiasis',
            ],
            [
                'name' => 'Neumonía nosocomial o intrahospitalaria',
            ],
            [
                'name' => 'Neuropatía periférica',
            ],
            [
                'name' => 'Parálisis del sueño aislada',
            ],
            [
                'name' => 'Parestesia',
            ],
            [
                'name' => 'Polimiositis del adulto',
            ],
            [
                'name' => 'Poliquistosis renal',
            ],
            [
                'name' => 'Rechazo al trasplante',
            ],
            [
                'name' => 'Riñones poliquísticos',
            ],
            [
                'name' => 'Sarcoma de Ewing',
            ],
            [
                'name' => 'Silicosis',
            ],
            [
                'name' => 'Síndrome de bradicardia-taquicardia',
            ],
            [
                'name' => 'Sindrome de DiGeorge',
            ],
            [
                'name' => 'Síndrome de Guillain-Barré',
            ],
            [
                'name' => 'Síndrome nefrótico',
            ],
            [
                'name' => 'Tos convulsiva',
            ],
            [
                'name' => 'Trastorno de identidad de género',
            ],
            [
                'name' => 'Trastorno del sueño durante el día',
            ],
            [
                'name' => 'Uremia',
            ],
            [
                'name' => 'Vasculitis necrosante',
            ],
            [
                'name' => 'Sarcoma de Kaposi',
            ],
            [
                'name' => 'Absceso alrededor del riñón (perinéfrico)',
            ],
            [
                'name' => 'Absceso perirrenal',
            ],
            [
                'name' => 'Acidosis tubular distal renal',
            ],
            [
                'name' => 'Acidosis tubular renal proximal',
            ],
            [
                'name' => 'Acidosis tubular renal tipo I',
            ],
            [
                'name' => 'Acidosis tubular renal tipo II',
            ],
            [
                'name' => 'Alcalosis',
            ],
            [
                'name' => 'ATR clásica',
            ],
            [
                'name' => 'ATR distal',
            ],
            [
                'name' => 'ATR proximal',
            ],
            [
                'name' => 'ATR tipo I',
            ],
            [
                'name' => 'ATR tipo II',
            ],
            [
                'name' => 'Azotemia prerrenal',
            ],
            [
                'name' => 'Cálculos de cistina',
            ],
            [
                'name' => 'Cálculos renales',
            ],
            [
                'name' => 'Cáncer',
            ],
            [
                'name' => 'Cistinuria',
            ],
            [
                'name' => 'Daño renal',
            ],
            [
                'name' => 'Disminución de la perfusión renal',
            ],
            [
                'name' => 'Disuria',
            ],
            [
                'name' => 'Diuresis osmótica',
            ],
            [
                'name' => 'Edema pulmonar',
            ],
            [
                'name' => 'Enfermedad con cambios mínimos',
            ],
            [
                'name' => 'Enfermedad de Berger',
            ],
            [
                'name' => 'Enfermedad de Kawasaki',
            ],
            [
                'name' => 'Enfermedad de Kimmelstiel-Wilson',
            ],
            [
                'name' => 'Enfermedad de Nil',
            ],
            [
                'name' => 'Enfermedad glomerular lúpica',
            ],
            [
                'name' => 'Enfermedad renal',
            ],
            [
                'name' => 'Enfermedad renal poliquística autosómica dominante',
            ],
            [
                'name' => 'Enfermedad renal terminal',
            ],
            [
                'name' => 'Esclerosis focal con hialinosis',
            ],
            [
                'name' => 'Falla crónica de los riñones',
            ],
            [
                'name' => 'Falla renal crónica',
            ],
            [
                'name' => 'Glomerulonefritis necrosante',
            ],
            [
                'name' => 'Hidronefrosis',
            ],
            [
                'name' => 'Hidronefrosis bilateral',
            ],
            [
                'name' => 'Hidronefrosis unilateral',
            ],
            [
                'name' => 'Hipercalciuria idiopática',
            ],
            [
                'name' => 'Hipernefroma',
            ],
            [
                'name' => 'Hipertensión arterial sistémica',
            ],
            [
                'name' => 'Hipertensión de tipo renovascular',
            ],
            [
                'name' => 'Insuficiencia aguda del riñón',
            ],
            [
                'name' => 'Insuficiencia del intestino delgado',
            ],
            [
                'name' => 'Insuficiencia renal',
            ],
            [
                'name' => 'Insuficiencia renal en estado terminal',
            ],
            [
                'name' => 'Insuficiencia renal por obstrucción crónica',
            ],
            [
                'name' => 'Insuficiencia renal terminal',
            ],
            [
                'name' => 'Lesión del riñón y uréter',
            ],
            [
                'name' => 'Lesión inflamatoria del riñón',
            ],
            [
                'name' => 'Necrosis de las papilas renales',
            ],
            [
                'name' => 'Necrosis renal medular',
            ],
            [
                'name' => 'Necrosis renal tubular',
            ],
            [
                'name' => 'Necrosis tubular aguda',
            ],
            [
                'name' => 'Nefritis crónica',
            ],
            [
                'name' => 'Nefritis intersticial',
            ],
            [
                'name' => 'Nefritis por fenacetina',
            ],
            [
                'name' => 'Nefroblastoma',
            ],
            [
                'name' => 'Nefrocalcinosis',
            ],
            [
                'name' => 'Nefropatía lùpica',
            ],
            [
                'name' => 'Nefropatía membranosa',
            ],
            [
                'name' => 'Nefropatía por analgésicos',
            ],
            [
                'name' => 'Nefropatía por IgA',
            ],
            [
                'name' => 'Nefropatía quística medular',
            ],
            [
                'name' => 'Nefropatía terminal',
            ],
            [
                'name' => 'Nefrosis',
            ],
            [
                'name' => 'Nefrosis lipoide',
            ],
            [
                'name' => 'Obstrucción de la unión U-P',
            ],
            [
                'name' => 'Obstrucción de la unión ureteropélvica',
            ],
            [
                'name' => 'Obstrucción de la UUP',
            ],
            [
                'name' => 'Obstrucción ureteral crónica',
            ],
            [
                'name' => 'Obstrucción uretral',
            ],
            [
                'name' => 'Obstrucción uretral aguda',
            ],
            [
                'name' => 'Poliarteritis nodosa',
            ],
            [
                'name' => 'Proteinuria',
            ],
            [
                'name' => 'Púrpura de Henoch-Schoenlein',
            ],
            [
                'name' => 'Rabdomiólisis',
            ],
            [
                'name' => 'Riñón fracturado',
            ],
            [
                'name' => 'Riñones quísticos',
            ],
            [
                'name' => 'Síndrome de Bartter',
            ],
            [
                'name' => 'Síndrome de embolización por colesterol',
            ],
            [
                'name' => 'Síndrome de Fanconi',
            ],
            [
                'name' => 'Síndrome de Lesch-Nyhan',
            ],
            [
                'name' => 'Síndrome de Russell-Silver',
            ],
            [
                'name' => 'Síndrome de Senior-Loken',
            ],
            [
                'name' => 'Síndrome nefrótico congénito',
            ],
            [
                'name' => 'Síndrome nefrótico de cambio mínimo',
            ],
            [
                'name' => 'Síndrome nefrótico idiopático de la niñez',
            ],
            [
                'name' => 'Uropatía obstructiva bilateral crónica',
            ],
            [
                'name' => 'Uropatía obstructiva unilateral crónica',
            ],
            [
                'name' => 'Crisis respiratoria en recién nacidos',
            ],
            [
                'name' => 'Ictericia del recién nacido',
            ],
            [
                'name' => 'Parálisis del VII par craneal debido a un traumatismo al nacer',
            ],
            [
                'name' => 'Síndrome de dificultad respiratoria en neonatos',
            ],
            [
                'name' => 'Tusilexil',
            ],
            [
                'name' => 'AFC',
            ],
            [
                'name' => 'Aire alrededor de los pulmones',
            ],
            [
                'name' => 'Alveolitis alérgica extrínseca',
            ],
            [
                'name' => 'Alveolitis fibrosante',
            ],
            [
                'name' => 'Alveolitis fibrosante criptógena',
            ],
            [
                'name' => 'Anomalías alveolares',
            ],
            [
                'name' => 'Antrosilicosis',
            ],
            [
                'name' => 'Asbestosis',
            ],
            [
                'name' => 'Aspergilosis aguda invasiva',
            ],
            [
                'name' => 'Aspergilosis pulmonar invasiva',
            ],
            [
                'name' => 'Atelectasia',
            ],
            [
                'name' => 'Bronconeumonía',
            ],
            [
                'name' => 'Bronquiectasia',
            ],
            [
                'name' => 'Bronquiectasia adquirida',
            ],
            [
                'name' => 'Bronquiectasia congénita',
            ],
            [
                'name' => 'Bronquiolitis',
            ],
            [
                'name' => 'Bronquitis',
            ],
            [
                'name' => 'Bronquitis aguda',
            ],
            [
                'name' => 'Bronquitis industrial',
            ],
            [
                'name' => 'Carbunco por inhalación',
            ],
            [
                'name' => 'Carbuncosis pulmonar',
            ],
            [
                'name' => 'Chlamydia psittaci',
            ],
            [
                'name' => 'Chlamydophila pneumoniae',
            ],
            [
                'name' => 'Colapso pulmonar espontáneo',
            ],
            [
                'name' => 'Congestión pulmonar/de pulmón',
            ],
            [
                'name' => 'Crup',
            ],
            [
                'name' => 'Crup espasmódico',
            ],
            [
                'name' => 'Crup viral',
            ],
            [
                'name' => 'DBP',
            ],
            [
                'name' => 'Deficiencia de AAT',
            ],
            [
                'name' => 'Deficiencia de alfa-1 antitripsina',
            ],
            [
                'name' => 'Derrame pleural tuberculoso',
            ],
            [
                'name' => 'Derrame pulmonar paraneumónico',
            ],
            [
                'name' => 'Difteria',
            ],
            [
                'name' => 'Displasia broncopulmonar',
            ],
            [
                'name' => 'Edema pulmonar a grandes alturas',
            ],
            [
                'name' => 'Edema pulmonar con aumento de la permeabilidad',
            ],
            [
                'name' => 'Edema pulmonar no cardiógeno',
            ],
            [
                'name' => 'Émbolo pulmonar',
            ],
            [
                'name' => 'Enfermedad de la membrana hialina',
            ],
            [
                'name' => 'Enfermedad obstructiva crónica de las vías respiratorias',
            ],
            [
                'name' => 'Enfermedad pulmonar',
            ],
            [
                'name' => 'Enfermedad pulmonar asociada a artritis reumatoidea',
            ],
            [
                'name' => 'Enfermedad pulmonar inducida por medicamentos',
            ],
            [
                'name' => 'Enfermedad pulmonar intersticial difusa',
            ],
            [
                'name' => 'Enfermedad pulmonar reumatoidea',
            ],
            [
                'name' => 'Enfermedad pulmonar vaso-oclusiva',
            ],
            [
                'name' => 'Enfisema',
            ],
            [
                'name' => 'Eosinofilia pulmonar simple',
            ],
            [
                'name' => 'EPOC',
            ],
            [
                'name' => 'Fibrosis pulmonar',
            ],
            [
                'name' => 'Gripe',
            ],
            [
                'name' => 'Hantavirus',
            ],
            [
                'name' => 'Hernia congénita del diafragma',
            ],
            [
                'name' => 'Hipertensión arterial pulmonar',
            ],
            [
                'name' => 'Infección del pecho',
            ],
            [
                'name' => 'Infección viral de las vías respiratorias bajas',
            ],
            [
                'name' => 'Insomnio crónico',
            ],
            [
                'name' => 'Linfoma mediastinal',
            ],
            [
                'name' => 'Mesotelioma maligno',
            ],
            [
                'name' => 'Mucormicosis',
            ],
            [
                'name' => 'Neumonía atípica',
            ],
            [
                'name' => 'Neumonía extrahospitalaria',
            ],
            [
                'name' => 'Neumonía necrosante',
            ],
            [
                'name' => 'Neumonía por aspiración',
            ],
            [
                'name' => 'Neumonía por micoplasma',
            ],
            [
                'name' => 'Neumonitis intersticial común',
            ],
            [
                'name' => 'Neumonitis pulmonar idiopática (NPI)',
            ],
            [
                'name' => 'Nódulos reumatoideos',
            ],
            [
                'name' => 'Pneumocystis jiroveci',
            ],
            [
                'name' => 'Pneumonía anaeróbica',
            ],
            [
                'name' => 'Pulmón rígido',
            ],
            [
                'name' => 'Ronquido',
            ],
            [
                'name' => 'Sarcoidosis del sistema nervioso',
            ],
            [
                'name' => 'SARS',
            ],
            [
                'name' => 'SCLC',
            ],
            [
                'name' => 'Síndrome de hipoventilación por obesidad',
            ],
            [
                'name' => 'Síndrome de Pickwick',
            ],
            [
                'name' => 'Síndrome pulmonar por hantavirus (virus hanta)',
            ],
            [
                'name' => 'TB',
            ],
            [
                'name' => 'Timoma mediastinal',
            ],
            [
                'name' => 'Tos ferina',
            ],
            [
                'name' => 'Traqueítis',
            ],
            [
                'name' => 'Traqueítis bacteriana aguda',
            ],
            [
                'name' => 'Tuberculosis extrapulmonar',
            ],
            [
                'name' => 'Tuberculosis miliar',
            ],
            [
                'name' => 'VSR',
            ],
            [
                'name' => 'Absceso de la médula espinal',
            ],
            [
                'name' => 'Absceso en el SNC',
            ],
            [
                'name' => 'Absceso epidural',
            ],
            [
                'name' => 'Accidente cerebrovascular hemorrágico',
            ],
            [
                'name' => 'Aneurisma cerebral',
            ],
            [
                'name' => 'Angiopatía amiloide cerebral',
            ],
            [
                'name' => 'Apoplejía',
            ],
            [
                'name' => 'Apoplejía hipofisaria',
            ],
            [
                'name' => 'Apoplejía secundaria a la displasia fibromuscular',
            ],
            [
                'name' => 'Astrocitoma en niños',
            ],
            [
                'name' => 'Cefalea en racimo',
            ],
            [
                'name' => 'Cierre prematuro de las suturas',
            ],
            [
                'name' => 'Compresión de la médula espinal',
            ],
            [
                'name' => 'Derrame cerebral',
            ],
            [
                'name' => 'Derrame subdural',
            ],
            [
                'name' => 'Disco roto',
            ],
            [
                'name' => 'DFM',
            ],
            [
                'name' => 'Ependimoma en adultos',
            ],
            [
                'name' => 'Ependimoma en niños',
            ],
            [
                'name' => 'Epilepsia',
            ],
            [
                'name' => 'Estrabismo divergente',
            ],
            [
                'name' => 'Exotropía',
            ],
            [
                'name' => 'Ganglioneuroma',
            ],
            [
                'name' => 'Glioma en adultos',
            ],
            [
                'name' => 'Hemorragia cerebral',
            ],
            [
                'name' => 'Hemorragia intracerebral lobular',
            ],
            [
                'name' => 'Hemorragia intracerebral profunda',
            ],
            [
                'name' => 'Hemorragia subaracnoidea',
            ],
            [
                'name' => 'Hernia amigdalina',
            ],
            [
                'name' => 'Hernia subfalcial',
            ],
            [
                'name' => 'Hernia transtentorial',
            ],
            [
                'name' => 'Hidrocefalia',
            ],
            [
                'name' => 'Hidrocefalia en adultos',
            ],
            [
                'name' => 'Malformación arteriovenosa cerebral',
            ],
            [
                'name' => 'Meduloblastoma en adultos',
            ],
            [
                'name' => 'Meningioma en adultos',
            ],
            [
                'name' => 'Neuroglioma en adultos',
            ],
            [
                'name' => 'Neuroma acústico',
            ],
            [
                'name' => 'Oligodendroglioma en adultos',
            ],
            [
                'name' => 'Parálisis ocular por lesión del nervio motor ocular externo',
            ],
            [
                'name' => 'Pseudotumor cerebral',
            ],
            [
                'name' => 'Quiste aracnoideo',
            ],
            [
                'name' => 'Seudotumor orbital',
            ],
            [
                'name' => 'Síndrome de herniación',
            ],
            [
                'name' => 'Síndrome del mesencéfalo dorsal',
            ],
            [
                'name' => 'Trastorno convulsivo',
            ],
            [
                'name' => 'Tumor cerebral en adultos',
            ],
            [
                'name' => 'Tumor cerebral infratentorial',
            ],
            [
                'name' => 'Tumor cerebral metastásico (secundario)',
            ],
            [
                'name' => 'Tumor de la médula espinal',
            ],
            [
                'name' => 'Tumor del ángulo pontocerebeloso',
            ],
            [
                'name' => 'Tumor del glomo timpánico',
            ],
            [
                'name' => 'Tumor hipotalámico',
            ],
            [
                'name' => 'Tumor maligno',
            ],
            [
                'name' => 'Accidente cerebrovascular',
            ],
            [
                'name' => 'ALS',
            ],
            [
                'name' => 'Alteraciones del sueño',
            ],
            [
                'name' => 'Deficiencia de arilsulfatasa A',
            ],
            [
                'name' => 'Deficiencia de miofosforilasa',
            ],
            [
                'name' => 'Deficiencia de PGYM',
            ],
            [
                'name' => 'Disfunción de los ganglios basales',
            ],
            [
                'name' => 'Disfunción del nervio axilar',
            ],
            [
                'name' => 'Disfunción del nervio ciático',
            ],
            [
                'name' => 'Disfunción del nervio cubital',
            ],
            [
                'name' => 'Disfunción del nervio femoral',
            ],
            [
                'name' => 'Disfunción del nervio mediano',
            ],
            [
                'name' => 'Disfunción del nervio mediano distal',
            ],
            [
                'name' => 'Disfunción del nervio peroneo común',
            ],
            [
                'name' => 'Disfunción del nervio radial',
            ],
            [
                'name' => 'Disfunción del nervio tibial',
            ],
            [
                'name' => 'Disfunción del plexo braquial',
            ],
            [
                'name' => 'Disfunción hereditaria del nervio peroneo',
            ],
            [
                'name' => 'Distrofia muscular de Becker',
            ],
            [
                'name' => 'Distrofia muscular de cintura escapulohumeral o pélvica (LGMD)',
            ],
            [
                'name' => 'Distrofia muscular de Duchenne',
            ],
            [
                'name' => 'Distrofia muscular de Landouzy-Dejerine',
            ],
            [
                'name' => 'Distrofia muscular facioescapulohumeral',
            ],
            [
                'name' => 'Distrofia muscular seudohipertrófica',
            ],
            [
                'name' => 'Distrofia muscular seudohipertrófica benigna',
            ],
            [
                'name' => 'Distrofias musculares de la cintura y extremidades',
            ],
            [
                'name' => 'Edema cerebral por grandes alturas',
            ],
            [
                'name' => 'Enfermedad del almacenamiento de glucógeno tipo V (GSDV)',
            ],
            [
                'name' => 'Esclerosis múltiple',
            ],
            [
                'name' => 'Glioma del nervio óptico',
            ],
            [
                'name' => 'Glioma del tronco encefálico',
            ],
            [
                'name' => 'Glioma hipotalámico',
            ],
            [
                'name' => 'Hiperserotoninemia',
            ],
            [
                'name' => 'Lesion de Nervios Perifericos',
            ],
            [
                'name' => 'Leucodistrofia de las células globoides',
            ],
            [
                'name' => 'Neuralgia migrañosa',
            ],
            [
                'name' => 'Neuropatía aislada',
            ],
            [
                'name' => 'Neuropatías metabólicas',
            ],
            [
                'name' => 'Retardo mental',
            ],
            [
                'name' => 'Síndrome de Horner',
            ],
            [
                'name' => 'Síndrome de la serotonina',
            ],
            [
                'name' => 'Síndrome de Shy-Drager',
            ],
            [
                'name' => 'Tumor cerebral en niños',
            ],
            [
                'name' => 'Accidente cerebrovascular pequeño',
            ],
            [
                'name' => 'Accidente cerebrovascular relacionado con el consumo de cocaína',
            ],
            [
                'name' => 'Accidente isquémico transitorio (AIT)',
            ],
            [
                'name' => 'Acondroplasia',
            ],
            [
                'name' => 'AIT',
            ],
            [
                'name' => 'Anomalías congénitas relacionadas con el alcohol',
            ],
            [
                'name' => 'Anosmia',
            ],
            [
                'name' => 'Astrocitoma en adultos',
            ],
            [
                'name' => 'Ataxia cerebelosa',
            ],
            [
                'name' => 'Ataxia cerebelosa aguda',
            ],
            [
                'name' => 'Ataxia de Friedreich',
            ],
            [
                'name' => 'Atrofia de Sudeck',
            ],
            [
                'name' => 'Atrofia del nervio óptico',
            ],
            [
                'name' => 'Atrofia del segundo par craneal',
            ],
            [
                'name' => 'Atrofia muscular neuropática progresiva del peroneo',
            ],
            [
                'name' => 'Atrofia olivopontocerebelosa',
            ],
            [
                'name' => 'Ausencias típicas',
            ],
            [
                'name' => 'Baile o mal de San Vito',
            ],
            [
                'name' => 'Cabeceo',
            ],
            [
                'name' => 'Cambios miopáticos',
            ],
            [
                'name' => 'Cefalea histamínica',
            ],
            [
                'name' => 'Cerebelitis',
            ],
            [
                'name' => 'Conmoción cerebral',
            ],
            [
                'name' => 'Convulsión de tipo gran mal',
            ],
            [
                'name' => 'Convulsión del lóbulo temporal',
            ],
            [
                'name' => 'Convulsión generalizada',
            ],
            [
                'name' => 'Convulsión inducida por fiebre',
            ],
            [
                'name' => 'Convulsión parcial (focal)',
            ],
            [
                'name' => 'Convulsión tónico-clónica',
            ],
            [
                'name' => 'Convulsiones febriles',
            ],
            [
                'name' => 'Corea de Sydenham',
            ],
            [
                'name' => 'Crisis de gran mal',
            ],
            [
                'name' => 'Crisis epiléptica en el lóbulo temporal',
            ],
            [
                'name' => 'Crisis epiléptica focal',
            ],
            [
                'name' => 'Crisis epiléptica Jacksoniana',
            ],
            [
                'name' => 'Daño a los nervios laríngeos',
            ],
            [
                'name' => 'DBL',
            ],
            [
                'name' => 'Deficiencia de aspartoacilasa',
            ],
            [
                'name' => 'Deficiencia de galactosilceramidasa',
            ],
            [
                'name' => 'Deficiencia de galactosilcerebrosidasa',
            ],
            [
                'name' => 'Deficiencia de glucocerebrosidasa',
            ],
            [
                'name' => 'Deficiencia de glucosilceramidasa',
            ],
            [
                'name' => 'Deficiencia de tiamina',
            ],
            [
                'name' => 'Degeneración combinada subaguda',
            ],
            [
                'name' => 'Degeneración espinocerebelosa',
            ],
            [
                'name' => 'Degeneración esponjosa del cerebro',
            ],
            [
                'name' => 'Degeneración olivopontocerebelosa',
            ],
            [
                'name' => 'Degeneración subaguda combinada de la médula espinal',
            ],
            [
                'name' => 'Demencia con distonía de la nuca',
            ],
            [
                'name' => 'Demencia de origen metabólico',
            ],
            [
                'name' => 'Demencia de tipo semántica',
            ],
            [
                'name' => 'Demencia semántica',
            ],
            [
                'name' => 'Disfluencia (falta de fluidez)',
            ],
            [
                'name' => 'Dolor de cabeza histamínico',
            ],
            [
                'name' => 'ELT',
            ],
            [
                'name' => 'EM',
            ],
            [
                'name' => 'Encefalitis',
            ],
            [
                'name' => 'Encefalitis de Dawson',
            ],
            [
                'name' => 'Encefalopatía espongiforme transmisible',
            ],
            [
                'name' => 'Enfermedad cerebrovascular hemorrágica',
            ],
            [
                'name' => 'Enfermedad de Arnold Pick',
            ],
            [
                'name' => 'Enfermedad de Canavan',
            ],
            [
                'name' => 'Enfermedad de Creutzfeldt-Jakob',
            ],
            [
                'name' => 'Enfermedad de Fahr',
            ],
            [
                'name' => 'Enfermedad de Hallervorden-Spatz',
            ],
            [
                'name' => 'Enfermedad de Jacob-Creutzfeldt',
            ],
            [
                'name' => 'Enfermedad de Jansky-Bielschowsky',
            ],
            [
                'name' => 'Enfermedad de las motoneuronas',
            ],
            [
                'name' => 'Enfermedad de las motoneuronas altas y bajas',
            ],
            [
                'name' => 'Enfermedad de Lou Gehrig',
            ],
            [
                'name' => 'Enfermedad de Pick',
            ],
            [
                'name' => 'Enfermedad de Spielmeyer-Vogt',
            ],
            [
                'name' => 'Enfermedad de Tay-Sachs',
            ],
            [
                'name' => 'Enfermedad de Werdnig-Hoffmann',
            ],
            [
                'name' => 'Enfermedad de Wernicke',
            ],
            [
                'name' => 'Enuresis',
            ],
            [
                'name' => 'Espasmo hemifacial',
            ],
            [
                'name' => 'Espasmo mímico',
            ],
            [
                'name' => 'EVC',
            ],
            [
                'name' => 'Fiebre recurrente transmitida por garrapatas',
            ],
            [
                'name' => 'Fiebre recurrente transmitida por piojos',
            ],
            [
                'name' => 'Fuga del LCR',
            ],
            [
                'name' => 'Glioblastoma multiforme en adultos',
            ],
            [
                'name' => 'Hematoma subdural',
            ],
            [
                'name' => 'Hemorragia intracerebral hipertensiva',
            ],
            [
                'name' => 'Hernia tentorial',
            ],
            [
                'name' => 'Higroma subdural',
            ],
            [
                'name' => 'Hipotensión intracraneal',
            ],
            [
                'name' => 'Histeria clásica',
            ],
            [
                'name' => 'Infarto de la hipófisis',
            ],
            [
                'name' => 'Intoxicación con metilmercurio',
            ],
            [
                'name' => 'Intoxicación con semillas envenenadas en Basora',
            ],
            [
                'name' => 'Isquemia de circulación posterior',
            ],
            [
                'name' => 'Jaqueca tensional mixta',
            ],
            [
                'name' => 'Kernicterus',
            ],
            [
                'name' => 'Leucoencefalitis esclerosante subaguda',
            ],
            [
                'name' => 'Malformación arteriovenosa pulmonar',
            ],
            [
                'name' => 'Malformación de Arnold Chiari',
            ],
            [
                'name' => 'MCP',
            ],
            [
                'name' => 'Meningitis meningocócica',
            ],
            [
                'name' => 'Meningitis por bacterias gramnegativas',
            ],
            [
                'name' => 'Mielinólisis central pontina',
            ],
            [
                'name' => 'Mielopatía sifilítica',
            ],
            [
                'name' => 'Migraña tensional mixta',
            ],
            [
                'name' => 'Narcolepsia',
            ],
            [
                'name' => 'Neuritis óptica',
            ],
            [
                'name' => 'Neuritis vestibular',
            ],
            [
                'name' => 'Neurofibromatosis acústica bilateral',
            ],
            [
                'name' => 'Neurolaberintitis viral',
            ],
            [
                'name' => 'Neuroma de Morton',
            ],
            [
                'name' => 'Neuropatía del nervio mediano distal',
            ],
            [
                'name' => 'Neuropatía hereditaria sensoriomotora',
            ],
            [
                'name' => 'Neuropatía multifocal',
            ],
            [
                'name' => 'Neurosarcoidosis',
            ],
            [
                'name' => 'OBS',
            ],
            [
                'name' => 'Panencefalitis esclerosante subaguda',
            ],
            [
                'name' => 'Parálisis agitante',
            ],
            [
                'name' => 'Parálisis con temblor',
            ],
            [
                'name' => 'Parálisis del nervio cubital',
            ],
            [
                'name' => 'Parálisis del nervio facial debido a un traumatismo durante el nacimiento',
            ],
            [
                'name' => 'Parálisis del VII nervio craneal',
            ],
            [
                'name' => 'Parkinsonismo de tipo secundario',
            ],
            [
                'name' => 'Pequeño mal (petit mal)',
            ],
            [
                'name' => 'Polineuritis idiopática aguda',
            ],
            [
                'name' => 'Prolapso de disco intervertebral',
            ],
            [
                'name' => 'Psicosis de Korsakoff',
            ],
            [
                'name' => 'PVL',
            ],
            [
                'name' => 'Retraso del desarrollo',
            ],
            [
                'name' => 'Retraso en el desarrollo psicomotor',
            ],
            [
                'name' => 'Schwannoma vestibular',
            ],
            [
                'name' => 'Síndrome cerebral crónico',
            ],
            [
                'name' => 'Síndrome cerebral orgánico crónico',
            ],
            [
                'name' => 'Síndrome de Briquet',
            ],
            [
                'name' => 'Síndrome de Budd-Chiari',
            ],
            [
                'name' => 'Síndrome de Tourette',
            ],
            [
                'name' => 'Síndrome de Wernicke-Korsakoff',
            ],
            [
                'name' => 'Sindrome de West',
            ],
            [
                'name' => 'Síndrome orgánico cerebral',
            ],
            [
                'name' => 'Síndrome papulovesicular acro-localizado',
            ],
            [
                'name' => 'Síndrome Psicorgánico',
            ],
            [
                'name' => 'Síndrome psiquiátrico de causa orgánica',
            ],
            [
                'name' => 'Siringomielia',
            ],
            [
                'name' => 'SSPE',
            ],
            [
                'name' => 'Temblor',
            ],
            [
                'name' => 'Temblor esencial',
            ],
            [
                'name' => 'Tic facial',
            ],
            [
                'name' => 'Tics faciales',
            ],
            [
                'name' => 'Trastorno de conversión',
            ],
            [
                'name' => 'Trastorno del sueño por ansiedad',
            ],
            [
                'name' => 'Trastornos asociados con el vértigo',
            ],
            [
                'name' => 'Trastornos circulatorios vertebrobasilares',
            ],
            [
                'name' => 'Trastornos neurológicos',
            ],
            [
                'name' => 'Traumatismo de la médula espinal',
            ],
            [
                'name' => 'Tumor cerebral cancerígeno primario en adultos',
            ],
            [
                'name' => 'Tumor cerebral cancerígeno primario en niños',
            ],
            [
                'name' => 'Tumor cerebral metastásico',
            ],
            [
                'name' => 'Tumores neuroendocrinos',
            ],
            [
                'name' => 'VCJD',
            ],
            [
                'name' => 'Enfermedades renales',
            ],
            [
                'name' => 'Síntomas gastrointestinales',
            ],
            [
                'name' => 'Trastorno por atracón',
            ],
            [
                'name' => 'Bulimia nerviosa',
            ],
            [
                'name' => 'Fenilcetonuria',
            ],
            [
                'name' => 'Fructosemia',
            ],
            [
                'name' => 'Intolerancia hereditaria a la fructosa',
            ],
            [
                'name' => 'Kwashiorkor',
            ],
            [
                'name' => 'Malabsorción',
            ],
            [
                'name' => 'Osteomalacia',
            ],
            [
                'name' => 'Síndrome de leche y alcalinos',
            ],
            [
                'name' => 'Trastorno de alimentación en la lactancia y en la primera infancia',
            ],
            [
                'name' => 'Obesidad infantil',
            ],
            [
                'name' => 'Absceso dental',
            ],
            [
                'name' => 'Alveolitis',
            ],
            [
                'name' => 'Amelogénesis imperfecta',
            ],
            [
                'name' => 'Anomalía dentaria',
            ],
            [
                'name' => 'Atrición dental',
            ],
            [
                'name' => 'Ausencia dentaria',
            ],
            [
                'name' => 'Avulsión dental',
            ],
            [
                'name' => 'Boca de trinchera',
            ],
            [
                'name' => 'Cáncer bucal',
            ],
            [
                'name' => 'Criptodoncia',
            ],
            [
                'name' => 'Desgaste dental',
            ],
            [
                'name' => 'Diente impactado',
            ],
            [
                'name' => 'Dientes apiñados',
            ],
            [
                'name' => 'Dientes desalineados',
            ],
            [
                'name' => 'Dolor post endodoncia',
            ],
            [
                'name' => 'Erosión Dental',
            ],
            [
                'name' => 'Fistula dental o en encía',
            ],
            [
                'name' => 'Fluorosis',
            ],
            [
                'name' => 'Fractura coronal',
            ],
            [
                'name' => 'Gingivitis',
            ],
            [
                'name' => 'Gingivitis ulceronecrosante aguda',
            ],
            [
                'name' => 'Gingivoestomatitis',
            ],
            [
                'name' => 'Halitosis',
            ],
            [
                'name' => 'Malformaciones craneofaciales',
            ],
            [
                'name' => 'Manchas en dientes',
            ],
            [
                'name' => 'Movilidad dentaria',
            ],
            [
                'name' => 'Osteonecrosis',
            ],
            [
                'name' => 'Pérdida de dientes',
            ],
            [
                'name' => 'Perlas de Epstein',
            ],
            [
                'name' => 'Pigmentación severa dental',
            ],
            [
                'name' => 'Sensibilidad dentaria',
            ],
            [
                'name' => 'Síndrome de Sjogren',
            ],
            [
                'name' => 'Traumatismo dental',
            ],
            [
                'name' => 'Úlceras bucales',
            ],
            [
                'name' => 'Acromatopsia',
            ],
            [
                'name' => 'Agujero macular',
            ],
            [
                'name' => 'Albinismo ocular',
            ],
            [
                'name' => 'Alta miopía',
            ],
            [
                'name' => 'Ambliopía',
            ],
            [
                'name' => 'AMD',
            ],
            [
                'name' => 'Astigmatismo',
            ],
            [
                'name' => 'Blefaritis',
            ],
            [
                'name' => 'Cáncer de ojo',
            ],
            [
                'name' => 'Cáncer de retina',
            ],
            [
                'name' => 'Cataratas congénitas',
            ],
            [
                'name' => 'Ceguera monocular transitoria',
            ],
            [
                'name' => 'Celulitis orbitaria',
            ],
            [
                'name' => 'Celulitis periorbitaria',
            ],
            [
                'name' => 'Celulitis preseptal',
            ],
            [
                'name' => 'Conducto nasolagrimal obstruido',
            ],
            [
                'name' => 'Conjuntivitis aguda',
            ],
            [
                'name' => 'Conjuntivitis del neonato',
            ],
            [
                'name' => 'Conjuntivitis granular',
            ],
            [
                'name' => 'Conjuntivitis primaveral',
            ],
            [
                'name' => 'Contracción del ojo',
            ],
            [
                'name' => 'Coriorretinitis',
            ],
            [
                'name' => 'Coroidopatía serosa central',
            ],
            [
                'name' => 'CRAO',
            ],
            [
                'name' => 'CRVO',
            ],
            [
                'name' => 'Dacrioadenitis',
            ],
            [
                'name' => 'Dacriostenosis',
            ],
            [
                'name' => 'Daltonismo',
            ],
            [
                'name' => 'Defectos de refracción',
            ],
            [
                'name' => 'Deficiencia de cistationina beta-sintasa',
            ],
            [
                'name' => 'Deficiencia de galactocinasa',
            ],
            [
                'name' => 'Deficiencia para ver los colores',
            ],
            [
                'name' => 'Degeneración macular',
            ],
            [
                'name' => 'Degeneración macular relacionada con la edad (AMD)',
            ],
            [
                'name' => 'Degeneración macular senil (SMD)',
            ],
            [
                'name' => 'Degeneración marginal pelúcida',
            ],
            [
                'name' => 'Derrame ocular',
            ],
            [
                'name' => 'Desprendimiento de retina',
            ],
            [
                'name' => 'Diplopía (visión doble)',
            ],
            [
                'name' => 'Distrofia corneal',
            ],
            [
                'name' => 'Distrofia de Fuchs',
            ],
            [
                'name' => 'Distrofias coroidales',
            ],
            [
                'name' => 'Edema macular',
            ],
            [
                'name' => 'Endoftalmitis',
            ],
            [
                'name' => 'Endotropía',
            ],
            [
                'name' => 'Enfermedad externa ocular',
            ],
            [
                'name' => 'Entropión',
            ],
            [
                'name' => 'Epiescleritis',
            ],
            [
                'name' => 'Escleritis',
            ],
            [
                'name' => 'Escotoma',
            ],
            [
                'name' => 'Esotropía',
            ],
            [
                'name' => 'Estrabismo',
            ],
            [
                'name' => 'Estrabismo convergente (ojos bizcos)',
            ],
            [
                'name' => 'Fosfeno',
            ],
            [
                'name' => 'Fracturas de la órbita',
            ],
            [
                'name' => 'Glaucoma',
            ],
            [
                'name' => 'Glaucoma congénito',
            ],
            [
                'name' => 'Glaucoma crónico',
            ],
            [
                'name' => 'Glaucoma de ángulo abierto',
            ],
            [
                'name' => 'Glaucoma de ángulo cerrado',
            ],
            [
                'name' => 'Hipermetropía',
            ],
            [
                'name' => 'Inchaço do Nervo Óptico',
            ],
            [
                'name' => 'Larva migratoria ocular',
            ],
            [
                'name' => 'Lesión corneal',
            ],
            [
                'name' => 'Meibomianitis',
            ],
            [
                'name' => 'Melanoma maligno del ojo',
            ],
            [
                'name' => 'Membrana epirretiniana macular',
            ],
            [
                'name' => 'Miopía',
            ],
            [
                'name' => 'Oclusión de las venas retinianas',
            ],
            [
                'name' => 'Oftalmia egipcia',
            ],
            [
                'name' => 'Ojo perezoso',
            ],
            [
                'name' => 'Ojo rojo',
            ],
            [
                'name' => 'Opacidad del cristalino',
            ],
            [
                'name' => 'Párpados caídos',
            ],
            [
                'name' => 'Pinguécula',
            ],
            [
                'name' => 'Presbicia',
            ],
            [
                'name' => 'Procesos inflamatorios del segmento posterior',
            ],
            [
                'name' => 'Protuberancia en el párpado',
            ],
            [
                'name' => 'Pterigión',
            ],
            [
                'name' => 'Ptosis',
            ],
            [
                'name' => 'Queratitis bacteriana',
            ],
            [
                'name' => 'Queratitis micótica',
            ],
            [
                'name' => 'Queratitis por Acanthamoeba',
            ],
            [
                'name' => 'Queratitis por herpes simple',
            ],
            [
                'name' => 'Queratocono',
            ],
            [
                'name' => 'Queratoglobo',
            ],
            [
                'name' => 'Retinitis pigmentaria',
            ],
            [
                'name' => 'Retinitis por citomegalovirus',
            ],
            [
                'name' => 'Retinopatía diabética',
            ],
            [
                'name' => 'Retinopatía hipertensiva',
            ],
            [
                'name' => 'Retinopatía serosa central',
            ],
            [
                'name' => 'RP',
            ],
            [
                'name' => 'Síndrome del ojo seco',
            ],
            [
                'name' => 'Síndrome VKH',
            ],
            [
                'name' => 'Tracoma',
            ],
            [
                'name' => 'Trauma ocular',
            ],
            [
                'name' => 'Tumor de retina',
            ],
            [
                'name' => 'Tumor ocular',
            ],
            [
                'name' => 'Úlceras e infecciones corneales',
            ],
            [
                'name' => 'Uveítis',
            ],
            [
                'name' => 'Visión baja',
            ],
            [
                'name' => 'Vitreoretinopatía proliferativa',
            ],
            [
                'name' => 'Adenocarcinoma de las células renales',
            ],
            [
                'name' => 'Cáncer de células transicionales de la pelvis renal o del uréter',
            ],
            [
                'name' => 'Cáncer de garganta',
            ],
            [
                'name' => 'Cáncer de pene',
            ],
            [
                'name' => 'Cáncer de próstata',
            ],
            [
                'name' => 'Cáncer escamocelular del pene',
            ],
            [
                'name' => 'Cáncer peniano',
            ],
            [
                'name' => 'Cáncer testicular',
            ],
            [
                'name' => 'CAP',
            ],
            [
                'name' => 'Carcinoma',
            ],
            [
                'name' => 'Carcinoma de células renales',
            ],
            [
                'name' => 'Carcinoma de células transicionales de la vejiga',
            ],
            [
                'name' => 'EICH',
            ],
            [
                'name' => 'Enfermedad injerto contra huésped',
            ],
            [
                'name' => 'Eritroplasia de Queyrat',
            ],
            [
                'name' => 'Ganglioneuroblastoma',
            ],
            [
                'name' => 'Leiomiosarcoma',
            ],
            [
                'name' => 'Metástasis cerebral',
            ],
            [
                'name' => 'Metástasis de hígado',
            ],
            [
                'name' => 'Metástasis ósea',
            ],
            [
                'name' => 'Neoplasia',
            ],
            [
                'name' => 'Osteosarcoma',
            ],
            [
                'name' => 'Rabdomiosarcoma',
            ],
            [
                'name' => 'Sarcoma botrioides',
            ],
            [
                'name' => 'Sarcoma de partes blandas',
            ],
            [
                'name' => 'Sarcoma osteógeno',
            ],
            [
                'name' => 'Síndrome del carcinoma basocelular nevoide',
            ],
            [
                'name' => 'Síndrome del cayado aórtico',
            ],
            [
                'name' => 'Tumor de células germinativas',
            ],
            [
                'name' => 'Tumor de la fosa posterior',
            ],
            [
                'name' => 'Tumor de los cordones sexuales',
            ],
            [
                'name' => 'Tumor del nervio de Jacobson',
            ],
            [
                'name' => 'Tumor del parto',
            ],
            [
                'name' => 'Tumor en el conducto salival',
            ],
            [
                'name' => 'Tumor estromático',
            ],
            [
                'name' => 'Tumor estromático gonadal',
            ],
            [
                'name' => 'Tumor metastásico de la pleura',
            ],
            [
                'name' => 'Tumor nasal benigno',
            ],
            [
                'name' => 'Tumores neuroectodérmicos primitivos',
            ],
            [
                'name' => 'Visión corta',
            ],
            [
                'name' => 'Acrodisostosis',
            ],
            [
                'name' => 'Acrodisplasia',
            ],
            [
                'name' => 'Antepié varo',
            ],
            [
                'name' => 'Arco alto',
            ],
            [
                'name' => 'Arcos caídos',
            ],
            [
                'name' => 'Arkless-Graham',
            ],
            [
                'name' => 'Artritis bacteriana',
            ],
            [
                'name' => 'Artritis bacteriana no gonocócica',
            ],
            [
                'name' => 'Artritis granulomatosa',
            ],
            [
                'name' => 'Cifoescoliosis',
            ],
            [
                'name' => 'Cifosis',
            ],
            [
                'name' => 'Codo de niñera',
            ],
            [
                'name' => 'Codo dislocado en niños',
            ],
            [
                'name' => 'Contractura isquémica',
            ],
            [
                'name' => 'Contractura isquémica de Volkmann',
            ],
            [
                'name' => 'DDC',
            ],
            [
                'name' => 'Dedo del pie en martillo',
            ],
            [
                'name' => 'Deficiencia de glucógeno fosforilasa en los músculos',
            ],
            [
                'name' => 'Deformidad en valgo del dedo gordo',
            ],
            [
                'name' => 'Deslizamiento de la epífisis capital femoral',
            ],
            [
                'name' => 'Desplazamiento',
            ],
            [
                'name' => 'Desplazamiento de la cabeza del fémur',
            ],
            [
                'name' => 'Desplazamiento de la epífisis femoral',
            ],
            [
                'name' => 'Dislocación de la cabeza radial',
            ],
            [
                'name' => 'Dislocación en el desarrollo de la cadera',
            ],
            [
                'name' => 'Displasia del desarrollo de la articulación de la cadera',
            ],
            [
                'name' => 'Displasia del desarrollo de la cadera',
            ],
            [
                'name' => 'Encorvadura de la espalda',
            ],
            [
                'name' => 'Enfermedad de Blount',
            ],
            [
                'name' => 'Enfermedad de Legg-Calve-Perthes',
            ],
            [
                'name' => 'Enfermedad de los huesos frágiles',
            ],
            [
                'name' => 'Enfermedad de Osgood-Schlatter',
            ],
            [
                'name' => 'Enfermedad de Perthes',
            ],
            [
                'name' => 'Enfermedad de Scheuermann',
            ],
            [
                'name' => 'Espondilitis',
            ],
            [
                'name' => 'Estenosis raquídea',
            ],
            [
                'name' => 'Fractura de la basa del metatarso',
            ],
            [
                'name' => 'Fractura de la pelvis',
            ],
            [
                'name' => 'Fracturas',
            ],
            [
                'name' => 'Fracturas de cadera',
            ],
            [
                'name' => 'Hombro de lanzador',
            ],
            [
                'name' => 'Hombro rígido',
            ],
            [
                'name' => 'Huesos delgados',
            ],
            [
                'name' => 'Inestabilidad Glenohumeral',
            ],
            [
                'name' => 'Inflamación discal',
            ],
            [
                'name' => 'Lesión de Ligamentarias de Rodilla',
            ],
            [
                'name' => 'Lesiones de cartílago articular',
            ],
            [
                'name' => 'Lesiones de Menisco',
            ],
            [
                'name' => 'Lesiones del tendón rotuliano',
            ],
            [
                'name' => 'Lesiones ligamentarias de rodillas',
            ],
            [
                'name' => 'Luxación de la cabeza del radio',
            ],
            [
                'name' => 'Luxación parcial del codo',
            ],
            [
                'name' => 'Necrosis ósea isquémica',
            ],
            [
                'name' => 'Necrosis papilar renal',
            ],
            [
                'name' => 'Neuropatía del nervio ciático',
            ],
            [
                'name' => 'Osteítis deformante',
            ],
            [
                'name' => 'Osteoporosis craneal congénita',
            ],
            [
                'name' => 'Pie cavo',
            ],
            [
                'name' => 'Pinzamiento Subacromial',
            ],
            [
                'name' => 'Polimialgia reumática',
            ],
            [
                'name' => 'Pronación del pie',
            ],
            [
                'name' => 'Pseudoartrosis',
            ],
            [
                'name' => 'Quiste de Baker',
            ],
            [
                'name' => 'Rodilla vara',
            ],
            [
                'name' => 'Subluxación de la cabeza del radio',
            ],
            [
                'name' => 'Subluxación del codo',
            ],
            [
                'name' => 'Tendinitis bicipital',
            ],
            [
                'name' => 'Tibia vara',
            ],
            [
                'name' => 'Absceso de las amígdalas',
            ],
            [
                'name' => 'Agrandamiento de adenoides',
            ],
            [
                'name' => 'Alergias nasales',
            ],
            [
                'name' => 'Angiofibroma juvenil',
            ],
            [
                'name' => 'Anomalías del olfato',
            ],
            [
                'name' => 'Atresia coanal',
            ],
            [
                'name' => 'Barotitis media',
            ],
            [
                'name' => 'Barotrauma',
            ],
            [
                'name' => 'Barotrauma del oído',
            ],
            [
                'name' => 'Bloqueo del oído',
            ],
            [
                'name' => 'Cáncer de las cuerdas vocales',
            ],
            [
                'name' => 'Cerumen (cera del oído)',
            ],
            [
                'name' => 'Colesteatoma',
            ],
            [
                'name' => 'Deterioro de la audición en los bebés',
            ],
            [
                'name' => 'Dolor de oído relacionado con la presión',
            ],
            [
                'name' => 'Epiglotitis',
            ],
            [
                'name' => 'Estapedectomía',
            ],
            [
                'name' => 'Fusión de los huesos del oído',
            ],
            [
                'name' => 'Hidropesía endolinfática',
            ],
            [
                'name' => 'Hipoacusia central en bebés',
            ],
            [
                'name' => 'Hipoacusia conductiva en los bebés',
            ],
            [
                'name' => 'Hipoacusia neurosensorial en los bebés',
            ],
            [
                'name' => 'Infección aguda del oído medio',
            ],
            [
                'name' => 'Infección aguda en el oído externo',
            ],
            [
                'name' => 'Infección aguda por citomegalovirus',
            ],
            [
                'name' => 'Infección crónica del oído',
            ],
            [
                'name' => 'Infección crónica del oído externo',
            ],
            [
                'name' => 'Infección crónica del oído medio',
            ],
            [
                'name' => 'Infección cutánea por estafilococos',
            ],
            [
                'name' => 'Infección de los tejidos por clostridio',
            ],
            [
                'name' => 'Infección del oído interno',
            ],
            [
                'name' => 'Laberintitis serosa',
            ],
            [
                'name' => 'Mastoiditis',
            ],
            [
                'name' => 'Misofonía',
            ],
            [
                'name' => 'Oído de nadador crónico',
            ],
            [
                'name' => 'Otitis',
            ],
            [
                'name' => 'Otitis externa aguda',
            ],
            [
                'name' => 'Otitis media aguda',
            ],
            [
                'name' => 'Otitis media asintomática',
            ],
            [
                'name' => 'Otitis media con derrame',
            ],
            [
                'name' => 'Otitis media secretora',
            ],
            [
                'name' => 'Otitis media serosa',
            ],
            [
                'name' => 'Otosclerosis',
            ],
            [
                'name' => 'Parálisis de las cuerdas vocales',
            ],
            [
                'name' => 'Perforación de la membrana timpánica',
            ],
            [
                'name' => 'Perforación o ruptura del tímpano',
            ],
            [
                'name' => 'Petrositis',
            ],
            [
                'name' => 'Pólipos nasales',
            ],
            [
                'name' => 'Quinsy',
            ],
            [
                'name' => 'Quistes gingivales del neonato',
            ],
            [
                'name' => 'Ránula',
            ],
            [
                'name' => 'Rinitis no alérgica',
            ],
            [
                'name' => 'Rinitis vasomotora',
            ],
            [
                'name' => 'Sangrado nasal',
            ],
            [
                'name' => 'Síndrome de Klein-Waardenburg',
            ],
            [
                'name' => 'Síndrome de Waardenburg',
            ],
            [
                'name' => 'Síndrome de Waardenburg-Shah',
            ],
            [
                'name' => 'Sinusitis crónica',
            ],
            [
                'name' => 'Sordera parcial en bebés',
            ],
            [
                'name' => 'SPI',
            ],
            [
                'name' => 'Supraglotitis',
            ],
            [
                'name' => 'Tinnitus',
            ],
            [
                'name' => 'Tumores de las glándulas salivales',
            ],
            [
                'name' => 'Abuso sexual infantil',
            ],
            [
                'name' => 'ACU',
            ],
            [
                'name' => 'ADD',
            ],
            [
                'name' => 'Alcaptonuria',
            ],
            [
                'name' => 'Anorquia',
            ],
            [
                'name' => 'Apnea de la prematuridad',
            ],
            [
                'name' => 'Apnea en recién nacidos',
            ],
            [
                'name' => 'ARJ',
            ],
            [
                'name' => 'Artritis idiopática juvenil',
            ],
            [
                'name' => 'Asfixia o ahogamiento',
            ],
            [
                'name' => 'Bebé prematuro',
            ],
            [
                'name' => 'Caput succedaneum',
            ],
            [
                'name' => 'Comunicación aortopulmonar',
            ],
            [
                'name' => 'Craneotabes',
            ],
            [
                'name' => 'Deficiencia de galactosamina-6-sulfatasa',
            ],
            [
                'name' => 'Deficiencia de la oxidasa del ácido homogentísico',
            ],
            [
                'name' => 'Deficiencia generalizada de reductasa',
            ],
            [
                'name' => 'Displasia condroectodérmica',
            ],
            [
                'name' => 'Disquitis',
            ],
            [
                'name' => 'Dolor de crecimiento',
            ],
            [
                'name' => 'Efectos del alcohol en el feto',
            ],
            [
                'name' => 'Encopresis',
            ],
            [
                'name' => 'Enfermedad de Hand-Schuller-Christian',
            ],
            [
                'name' => 'Enfermedad de la orina con olor a jarabe de arce',
            ],
            [
                'name' => 'Enfermedad de Still',
            ],
            [
                'name' => 'Enfermedades del sistema nervioso central',
            ],
            [
                'name' => 'Ensuciarse en la ropa',
            ],
            [
                'name' => 'Episodios cianóticos en recién nacidos',
            ],
            [
                'name' => 'Epispadias',
            ],
            [
                'name' => 'Eritema infeccioso',
            ],
            [
                'name' => 'Escafocefalia',
            ],
            [
                'name' => 'Espasmos del llanto',
            ],
            [
                'name' => 'Estreñimiento en niños',
            ],
            [
                'name' => 'Faringitis viral',
            ],
            [
                'name' => 'Fenilcetonuria neonatal',
            ],
            [
                'name' => 'Fibrodisplasia',
            ],
            [
                'name' => 'Fiebre en niños',
            ],
            [
                'name' => 'Fractura de clavícula en el recién nacido',
            ],
            [
                'name' => 'Glioblastoma multiforme en niños',
            ],
            [
                'name' => 'Glioma en niños',
            ],
            [
                'name' => 'Hemangioendotelioma infantil',
            ],
            [
                'name' => 'Hiperbilirrubinemia neonatal',
            ],
            [
                'name' => 'Hiperplasia fibrosa idiopática',
            ],
            [
                'name' => 'Hiperplasia fibrosa inflamatoria',
            ],
            [
                'name' => 'Hiperviscosidad en los recién nacidos',
            ],
            [
                'name' => 'Hipoglucemia neonatal',
            ],
            [
                'name' => 'Hipotiroidismo primario',
            ],
            [
                'name' => 'Homocistinuria',
            ],
            [
                'name' => 'Ictericia familiar no hemolítica - no obstructiva',
            ],
            [
                'name' => 'Infección urinaria en niños',
            ],
            [
                'name' => 'Infecciones',
            ],
            [
                'name' => 'Intoxicación neonatal por cloranfenicol',
            ],
            [
                'name' => 'Intususcepción en los niños',
            ],
            [
                'name' => 'Iritis',
            ],
            [
                'name' => 'Laringomalacia',
            ],
            [
                'name' => 'Laringotraqueobronquitis aguda',
            ],
            [
                'name' => 'Linfoma de Burkitt',
            ],
            [
                'name' => 'Maltrato psicológico y abandono infantil',
            ],
            [
                'name' => 'Meduloblastoma en niños',
            ],
            [
                'name' => 'Meningioma en niños',
            ],
            [
                'name' => 'Microcefalia',
            ],
            [
                'name' => 'Muerte en la cuna',
            ],
            [
                'name' => 'Neuroblastoma',
            ],
            [
                'name' => 'Neuroglioma en niños',
            ],
            [
                'name' => 'Oftalmía neonatal',
            ],
            [
                'name' => 'Oftalmoplejía supranuclear',
            ],
            [
                'name' => 'Oligodendroglioma en niños',
            ],
            [
                'name' => 'OME',
            ],
            [
                'name' => 'Osteogénesis imperfecta',
            ],
            [
                'name' => 'Osteomalacia en niños',
            ],
            [
                'name' => 'Parálisis infantil',
            ],
            [
                'name' => 'Parálisis por garrapata',
            ],
            [
                'name' => 'Poliarteritis infantil',
            ],
            [
                'name' => 'Policitemia neonatal',
            ],
            [
                'name' => 'Purgaciones',
            ],
            [
                'name' => 'Raquitismo en neonatos',
            ],
            [
                'name' => 'Raquitismo renal',
            ],
            [
                'name' => 'Retinoblastoma',
            ],
            [
                'name' => 'SAN',
            ],
            [
                'name' => 'Septicemia',
            ],
            [
                'name' => 'Septicemia neonatal por estreptococos del grupo B',
            ],
            [
                'name' => 'Seudogota',
            ],
            [
                'name' => 'Síndrome de abstinencia neonatal',
            ],
            [
                'name' => 'Síndrome de Aicardi',
            ],
            [
                'name' => 'Síndrome de carencia materna',
            ],
            [
                'name' => 'Síndrome de disfunción inmunitaria',
            ],
            [
                'name' => 'Síndrome de Gilles de la Tourette',
            ],
            [
                'name' => 'Sindrome del niño golpeado',
            ],
            [
                'name' => 'Síndrome del recién nacido gris',
            ],
            [
                'name' => 'Sinovitis tóxica',
            ],
            [
                'name' => 'Sinovitis transitoria',
            ],
            [
                'name' => 'SMSL',
            ],
            [
                'name' => 'Trastorno de conducta',
            ],
            [
                'name' => 'Trastorno de las matemáticas',
            ],
            [
                'name' => 'Trastorno de movimientos estereotípicos',
            ],
            [
                'name' => 'Trastorno de vinculación reactiva de la lactancia o la primera infancia',
            ],
            [
                'name' => 'TTN',
            ],
            [
                'name' => 'Tuberculosis renal juvenil familiar',
            ],
            [
                'name' => 'Tumor cerebral canceroso (metastásico)',
            ],
            [
                'name' => 'Tumor en los huesos',
            ],
            [
                'name' => 'Virus sincicial respiratorio (VSR)',
            ],
            [
                'name' => 'Vólvulo intestinal',
            ],
            [
                'name' => 'Absceso rectal',
            ],
            [
                'name' => 'Comportamiento suicida',
            ],
            [
                'name' => 'Conducta agresiva',
            ],
            [
                'name' => 'Depresión crónica',
            ],
            [
                'name' => 'Depresión en adolescentes',
            ],
            [
                'name' => 'Depresión grave',
            ],
            [
                'name' => 'Deseo sexual inhibido',
            ],
            [
                'name' => 'Distimia',
            ],
            [
                'name' => 'Estrés laboral',
            ],
            [
                'name' => 'Eyaculación retrasada en el sexo',
            ],
            [
                'name' => 'Fobia específica o simple',
            ],
            [
                'name' => 'Insomnio psicofisiológico (aprendido)',
            ],
            [
                'name' => 'Ludopatía',
            ],
            [
                'name' => 'Mutismo selectivo',
            ],
            [
                'name' => 'Neurosis histérica',
            ],
            [
                'name' => 'Personalidad psicopática',
            ],
            [
                'name' => 'Psicosis',
            ],
            [
                'name' => 'Síndrome del Caballero Blanco',
            ],
            [
                'name' => 'Trastorno bipolar afectivo',
            ],
            [
                'name' => 'Trastorno de adaptación',
            ],
            [
                'name' => 'Trastorno de la personalidad esquizoide',
            ],
            [
                'name' => 'Trastorno de la personalidad evasiva',
            ],
            [
                'name' => 'Trastorno de oposición desafiante',
            ],
            [
                'name' => 'Trastorno esquizoafectivo',
            ],
            [
                'name' => 'Trastornos de la personalidad',
            ],
            [
                'name' => 'Tricotilomanía',
            ],
            [
                'name' => 'Abstinencia de opiáceos',
            ],
            [
                'name' => 'Abuso de drogas y farmacodependencia',
            ],
            [
                'name' => 'Abuso sexual',
            ],
            [
                'name' => 'Aflicción',
            ],
            [
                'name' => 'Arrancamiento compulsivo del cabello',
            ],
            [
                'name' => 'Ataques de pánico',
            ],
            [
                'name' => 'Aversión al sexo',
            ],
            [
                'name' => 'Codependencia',
            ],
            [
                'name' => 'Comportamiento psicótico',
            ],
            [
                'name' => 'Congoja',
            ],
            [
                'name' => 'Delirio',
            ],
            [
                'name' => 'Dependencia del alcohol',
            ],
            [
                'name' => 'Depresión alucinatoria',
            ],
            [
                'name' => 'Depresión neurótica (distimia)',
            ],
            [
                'name' => 'Depresión posparto',
            ],
            [
                'name' => 'Depresión psicótica',
            ],
            [
                'name' => 'Depresión unipolar',
            ],
            [
                'name' => 'Deseo sexual hipoactivo',
            ],
            [
                'name' => 'Desorden de ansiedad por separación',
            ],
            [
                'name' => 'Desregulación disruptiva del estado de ánimo',
            ],
            [
                'name' => 'Discapacidad intelectual',
            ],
            [
                'name' => 'Enfermedades y dolor crónico',
            ],
            [
                'name' => 'Esquizofrenia desorganizada',
            ],
            [
                'name' => 'Esquizofrenia hebefrénica',
            ],
            [
                'name' => 'Eyaculación precoz',
            ],
            [
                'name' => 'Eyaculación retrasada',
            ],
            [
                'name' => 'Fagofobia',
            ],
            [
                'name' => 'Intoxicación con anfetaminas',
            ],
            [
                'name' => 'Intoxicación con barbitúricos',
            ],
            [
                'name' => 'Intoxicación con estimulantes',
            ],
            [
                'name' => 'Intoxicación con marihuana',
            ],
            [
                'name' => 'Luto',
            ],
            [
                'name' => 'Misofobia',
            ],
            [
                'name' => 'Psicosis reactiva breve',
            ],
            [
                'name' => 'TAG',
            ],
            [
                'name' => 'Tics transitorios',
            ],
            [
                'name' => 'Trastorno ciclotímico',
            ],
            [
                'name' => 'Trastorno de la conducta alimentaria',
            ],
            [
                'name' => 'Trastorno de la personalidad pasivo-agresiva',
            ],
            [
                'name' => 'Trastorno de pánico con agorafobia',
            ],
            [
                'name' => 'Trastorno de personalidad histriónica',
            ],
            [
                'name' => 'Trastorno de personalidad narcisista',
            ],
            [
                'name' => 'Trastorno del control de los impulsos',
            ],
            [
                'name' => 'Trastorno esquizotípico de la personalidad',
            ],
            [
                'name' => 'Abstinencia de la cocaína',
            ],
            [
                'name' => 'Alucinosis alcohólica',
            ],
            [
                'name' => 'Ciclotimia',
            ],
            [
                'name' => 'Consumo excesivo de alcohol',
            ],
            [
                'name' => 'Delirium tremens',
            ],
            [
                'name' => 'Demencia frontotemporal',
            ],
            [
                'name' => 'Depresión maníaca',
            ],
            [
                'name' => 'Depresión mayor',
            ],
            [
                'name' => 'Desorden de personalidad antisocial',
            ],
            [
                'name' => 'Enfermedad de Letterer-Siwe',
            ],
            [
                'name' => 'Esquizofrenia de tipo paranoide',
            ],
            [
                'name' => 'Personalidad sociopática',
            ],
            [
                'name' => 'Salud mental en el embarazo',
            ],
            [
                'name' => 'Tic=> trastorno de tic motor crónico',
            ],
            [
                'name' => 'Trastorno bipolar',
            ],
            [
                'name' => 'Trastorno de pánico',
            ],
            [
                'name' => 'Trastorno de personalidad antisocial',
            ],
            [
                'name' => 'Trastorno de personalidad paranoide',
            ],
            [
                'name' => 'Trastorno depresivo',
            ],
            [
                'name' => 'Trastorno dismórfico corporal',
            ],
            [
                'name' => 'Trastorno fronterizo de la personalidad',
            ],
            [
                'name' => 'Trastorno límite de la personalidad',
            ],
            [
                'name' => 'Trastorno mental orgánico',
            ],
            [
                'name' => 'Trastornos de síntomas somáticos',
            ],
            [
                'name' => 'Trastornos del espectro',
            ],
            [
                'name' => 'Cervicalgía',
            ],
            [
                'name' => 'Cifosis postural',
            ],
            [
                'name' => 'Hiperlordosis',
            ],
            [
                'name' => 'Manos entumidas',
            ],
            [
                'name' => 'Síndrome del periforme',
            ],
            [
                'name' => 'Subluxación',
            ],
            [
                'name' => 'Subluxación vertebral',
            ],
            [
                'name' => 'Enfermedad articulada',
            ],
            [
                'name' => 'Hipertensión portal',
            ],
            [
                'name' => 'Inflamación de la vaina del tendón',
            ],
            [
                'name' => 'Carcinoma de células basales',
            ],
            [
                'name' => 'Edema por parálisis',
            ],
            [
                'name' => 'Edema postquirúrgico',
            ],
            [
                'name' => 'Edema postraumático',
            ],
            [
                'name' => 'Epicondilitis lateral',
            ],
            [
                'name' => 'Esguince',
            ],
            [
                'name' => 'Hombro doloroso',
            ],
            [
                'name' => 'Miositis',
            ],
            [
                'name' => 'Alteraciones articulares',
            ],
            [
                'name' => 'Anticoagulantes lúpicos',
            ],
            [
                'name' => 'AOSD',
            ],
            [
                'name' => 'AR',
            ],
            [
                'name' => 'Arteritis temporal',
            ],
            [
                'name' => 'Artritis cervical',
            ],
            [
                'name' => 'Artritis gonocócica',
            ],
            [
                'name' => 'Artritis gotosa crónica',
            ],
            [
                'name' => 'Artritis micótica',
            ],
            [
                'name' => 'Artritis por hongos',
            ],
            [
                'name' => 'Artritis reumatoide juvenil',
            ],
            [
                'name' => 'Artritis tuberculosa',
            ],
            [
                'name' => 'Artritis viral',
            ],
            [
                'name' => 'Costocondritis',
            ],
            [
                'name' => 'EAD',
            ],
            [
                'name' => 'Enfermedad CPPD',
            ],
            [
                'name' => 'Enfermedad de Paget',
            ],
            [
                'name' => 'Enfermedad periódica',
            ],
            [
                'name' => 'Enfermedad por depósitos de dihidrato de pirofosfato cálcico',
            ],
            [
                'name' => 'Enfermedad reumatoidea del colágeno',
            ],
            [
                'name' => 'Enfermedad vascular del colágeno',
            ],
            [
                'name' => 'Esclerosis sistémica progresiva',
            ],
            [
                'name' => 'Espondilitis reumatoidea',
            ],
            [
                'name' => 'Fibrositis',
            ],
            [
                'name' => 'Intoxicación con Paraquat',
            ],
            [
                'name' => 'LES',
            ],
            [
                'name' => 'Osteoartritis cervical',
            ],
            [
                'name' => 'Osteoartritis hipertrófica',
            ],
            [
                'name' => 'Osteocondritis deformante juvenil',
            ],
            [
                'name' => 'Osteocondrosis',
            ],
            [
                'name' => 'Parálisis aislada del sueño',
            ],
            [
                'name' => 'Pulmón de Paraquat',
            ],
            [
                'name' => 'Raquitismo',
            ],
            [
                'name' => 'Síndrome del nevo varicoso osteohipertrófico',
            ],
            [
                'name' => 'Disfunciones sensoriales',
            ],
            [
                'name' => 'Capsulitis adhesiva',
            ],
            [
                'name' => 'Enfermedad de Quervain',
            ],
            [
                'name' => 'Periostitis',
            ],
            [
                'name' => 'Talalgia',
            ],
            [
                'name' => 'Abstinencia de opioides',
            ],
            [
                'name' => 'Aspiración de vómito',
            ],
            [
                'name' => 'Hematoma vesical',
            ],
            [
                'name' => 'Lesión vesical',
            ],
            [
                'name' => 'Agrandamiento de la próstata',
            ],
            [
                'name' => 'Bloqueo de la unión ureteropélvica',
            ],
            [
                'name' => 'Cálculos en las vías urinarias',
            ],
            [
                'name' => 'Cáncer testicular no seminoma',
            ],
            [
                'name' => 'Cáncer vesical',
            ],
            [
                'name' => 'CI (cistitis intersticia)',
            ],
            [
                'name' => 'Cistitis abacteriana',
            ],
            [
                'name' => 'Cistitis por radiación',
            ],
            [
                'name' => 'Cistitis quimica',
            ],
            [
                'name' => 'Cistitis intersticial',
            ],
            [
                'name' => 'Curvatura del pene',
            ],
            [
                'name' => 'Enfermedad de Ormond',
            ],
            [
                'name' => 'Enfermedad de Peyronie',
            ],
            [
                'name' => 'Epididimitis',
            ],
            [
                'name' => 'Espermatocele',
            ],
            [
                'name' => 'Estenosis uretral',
            ],
            [
                'name' => 'Fimosis',
            ],
            [
                'name' => 'Glándulas de Tyson',
            ],
            [
                'name' => 'Hipercalciuria idioptica',
            ],
            [
                'name' => 'Hiperplasia prostática',
            ],
            [
                'name' => 'Incompetencia eyaculatoria',
            ],
            [
                'name' => 'Incontinencia con tenesmo',
            ],
            [
                'name' => 'Infecciones de vías urinarias',
            ],
            [
                'name' => 'Insuficiencia testicular',
            ],
            [
                'name' => 'Lesión uretral',
            ],
            [
                'name' => 'Ocronosis alcaptonúrica',
            ],
            [
                'name' => 'Orquitis',
            ],
            [
                'name' => 'Piedras en el riñón',
            ],
            [
                'name' => 'Prostatitis aguda',
            ],
            [
                'name' => 'Próstata agrandada',
            ],
            [
                'name' => 'Prostatitis bacteriana crónica',
            ],
            [
                'name' => 'Prostatitis no bacteriana',
            ],
            [
                'name' => 'Retención aguda de orina (RAO)',
            ],
            [
                'name' => 'Ruptura uretral',
            ],
            [
                'name' => 'Síndrome hepatorrenal',
            ],
            [
                'name' => 'Testículo no descendido',
            ],
            [
                'name' => 'Torsión testicular',
            ],
            [
                'name' => 'Trastornos urológicos',
            ],
            [
                'name' => 'Tumor del riñón o Tumor renal',
            ],
            [
                'name' => 'Uropatía obstructiva aguda bilateral',
            ],
            [
                'name' => 'Uretritis crónica',
            ],
            [
                'name' => 'Uropatía obstructiva',
            ],
            [
                'name' => 'Uretritis',
            ],
            [
                'name' => 'Vejiga caída',
            ],
            [
                'name' => 'Vejiga inestable',
            ],
            [
                'name' => 'Venas varicosas en el escroto',
            ],

        ]);
    }
}
