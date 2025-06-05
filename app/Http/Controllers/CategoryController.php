<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHouseRepository,
        CategoryRepositoryInterface $categoryRepository,
    ) {
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->categoryRepository = $categoryRepository;
    }

    //show(slug)
    public function show($slug)
    {
        //categories
        $category = $this->categoryRepository->getCategoryBySlug($slug);
        $boardingHouses = $this->boardingHouseRepository->getBoardingHouseByCategorySlug($slug);

        return view('pages.category.show', compact('category', 'boardingHouses'));
    }
}
