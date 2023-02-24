namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testProductIndex()
    {
        $products = Product::factory()->count(5)->create();

        $response = $this->getJson('/api/products');

        $response->assertOk();
        $response->assertJsonCount(5, 'data');
    }

    public function testProductShow()
    {
        $product = Product::factory()->create();

        $response = $this->getJson("/api/products/$product->id");

        $response->assertOk();
        $response->assertJson([
            'data' => [
                'id' => $product->id,
                'title' => $product->title,
                'description' => $product->description,
                'price' => $product->price,
                'ready_for_sale' => $product->ready_for_sale,
            ]
        ]);
    }

    public function testProductStore()
    {
        $productData = [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'ready_for_sale' => $this->faker->boolean,
        ];

        $response = $this->postJson('/api/products', $productData);

        $response->assertCreated();
        $response->assertJson([
            'data' => [
                'title' => $productData['title'],
                'description' => $productData['description'],
                'price' => $productData['price'],
                'ready_for_sale' => $productData['ready_for_sale'],
            ]
        ]);
    }

    public function testProductUpdate()
    {
        $product = Product::factory()->create();

        $productData = [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'ready_for_sale' => $this->faker->boolean,
        ];

        $response = $this->putJson("/api/products/$product->id", $productData);

        $response->assertOk();
    }
