<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Product;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        try {

            $userMessage = $request->message;

            // 🔎 (OPCIONAL) Obtener productos de la BD
            $products = Product::select('name', 'description', 'price')->limit(5)->get();

            $productText = "";

            foreach ($products as $product) {
                $productText .= "Producto: {$product->name}, Precio: {$product->price}, Descripción: {$product->description}\n";
            }

            // 🤖 Petición a OpenAI
            $response = Http::withToken(env('OPENAI_API_KEY'))
                ->post('https://api.openai.com/v1/chat/completions', [
                    'model' => 'gpt-4o-mini',
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => "Eres un asistente de ventas de un ecommerce. 
                            Ayuda a los clientes a encontrar productos y responde de forma clara y amigable.

                            Productos disponibles:
                            $productText
                            "
                        ],
                        [
                            'role' => 'user',
                            'content' => $userMessage
                        ]
                    ],
                    'temperature' => 0.7
                ]);

            // ❌ Error de API
            if ($response->failed()) {
                return response()->json([
                    'reply' => 'Error API: ' . $response->body()
                ]);
            }

            // ✅ Respuesta correcta
            return response()->json([
                'reply' => $response['choices'][0]['message']['content']
            ]);
        } catch (\Exception $e) {

            // ❌ Error general
            return response()->json([
                'reply' => 'Error servidor: ' . $e->getMessage()
            ]);
        }
    }
}
