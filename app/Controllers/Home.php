<?php

namespace App\Controllers;

use App\Controllers\Admin\AdminBaseResourceController;

use App\Models\Admin\AdminBanner_model;
use App\Models\Admin\AdminAbout_model;
use App\Models\Admin\AdminProduct_model;
use App\Models\Admin\AdminServices_model;
use App\Models\Admin\AdminFeature_model;
use App\Models\Admin\AdminWorks_model;
use App\Models\Admin\AdminContact_model;
use App\Models\Admin\AdminProductTypes_model;
use App\Models\Admin\AdminProductTypeDetails_model;
use App\Models\User\UserContactDetails_model;
use App\Models\Admin\AdminServiceFeature_model;
use App\Models\Admin\AdminContent_model;

class Home extends AdminBaseResourceController
{

	public function index()
	{
		$BannerModel = new AdminBanner_model();
		$AboutModel =  new AdminAbout_model();
		$ProductModel = new AdminProduct_model();
		$ServicesModel = new AdminServices_model();
		$FeatureModel = new AdminFeature_model();
		$WorksModel  = new AdminWorks_model();
		$ContactModel  = new AdminContact_model();
		$ContentModel = new AdminContent_model();

		$data['navProducts'] = $ProductModel->where('status', '1')->select('productID, canonicalName, productTitle, productImageUrl, menuProductImageUrl')->orderBy('showOrder', 'ASC')->limit(9)->get()->getResult();
		$data['navService'] = $ServicesModel->select('serviceID, canonicalName, serviceTitle')->orderBy('showOrder', 'ASC')->get()->getResult();
		$data['bannerDetails'] = $BannerModel->select('bannerID, bannerHeading, bannerTitle, bannerUrl, bannerFileUrl')->orderBy('showOrder', 'ASC')->get()->getResultArray();
		$data['contactDetails'] = $ContactModel->where('contactType', 'main')->select('*')->first();
		$data['aboutDashboardDetails'] = $AboutModel->where('aboutType', 'aboutdashboard')->select('aboutID, aboutType, bannerTitle, bannerImageUrl, aboutAuthorName, aboutTitle, aboutDescription, aboutImageUrl')->first();
		$data['productDetails'] = $ProductModel->distinct()
			->select('P.productID, P.productTypeIDs, P.canonicalName, P.productTitle, P.productImageUrl, PM.materialName')
			->from('products as P')
			->join('product_material as PM', 'P.materialID = PM.materialID')
			->where('P.status', '1')
			->limit(9)
			->orderBy('P.showOrder', 'ASC')
			->get()->getResultArray();
		$data['dashboardChooseDetails'] = $AboutModel->where('aboutType', 'dashboardchoose')->select('aboutID, aboutType, bannerTitle, bannerImageUrl, aboutAuthorName, aboutTitle, aboutDescription')->first();
		// echo $AboutModel->getLastQuery()->getQuery();die();
		$data['serviceDetails'] = $ServicesModel->select('serviceID, canonicalName, serviceTitle, serviceBannerImageUrl')->limit(3)->orderBy('showOrder', 'ASC')->get()->getResultArray();
		$data['dashboardProjectDetails'] = $AboutModel->where('aboutType', 'dashboardprojectside')->select('aboutID, aboutType, aboutAuthorName, aboutTitle')->first();
		$data['featuresDetails'] = $FeatureModel->select('featureID, featureTitle, featureDescription, featureIconUrl')->orderBy('showOrder', 'ASC')->limit(6)->get()->getResult();
		$data['worksDetails'] = $WorksModel->distinct()
			->select("OW.workID, OW.canonicalName, OW.projectTitle, OW.workImageUrl, WC.categoryName")
			->from('our_works as OW')
			->join('work_category as WC', 'OW.workCategoryID = WC.categoryID')
			->orderBy('OW.showOrder', 'ASC')
			->limit(4)->get()->getResult();
		$data['contentDetails'] = $ContentModel->where('contentType', 'Dashboard')->select('*')->first();

		// print_r($data['dashboardChooseDetails']);
		// die();
		return view('frontend/index', $data);
	}

	public function about()
	{

		$AboutModel =  new AdminAbout_model();
		$ProductModel = new AdminProduct_model();
		$ServicesModel = new AdminServices_model();
		$ContactModel  = new AdminContact_model();

		$data['navProducts'] = $ProductModel->where('status', '1')->select('productID, canonicalName, productTitle, productImageUrl, menuProductImageUrl')->orderBy('showOrder', 'ASC')->limit(9)->get()->getResult();
		$data['navService'] = $ServicesModel->select('serviceID, canonicalName, serviceTitle')->orderBy('showOrder', 'ASC')->get()->getResult();
		$data['contactDetails'] = $ContactModel->where('contactType', 'main')->select('*')->first();
		$data['aboutPageDetails'] = $AboutModel->where('aboutType', 'aboutpage')->select('')->first(); // echo "About";

		return view('frontend/about', $data);
	}

	public function services($canonicalName = null)
	{
		$ContactModel  = new AdminContact_model();
		$ProductModel = new AdminProduct_model();
		$ServicesModel = new AdminServices_model();
		$ServiceFeatureModel = new AdminServiceFeature_model();

		$data['navProducts'] = $ProductModel->where('status', '1')->select('productID, canonicalName, productTitle, productImageUrl, menuProductImageUrl')->orderBy('showOrder', 'ASC')->limit(9)->get()->getResult();
		$data['navService'] = $ServicesModel->select('serviceID, canonicalName, serviceTitle')->orderBy('showOrder', 'ASC')->get()->getResult();
		$data['contactDetails'] = $ContactModel->where('contactType', 'main')->select('*')->first();

		$data['serviceDetails'] = $ServicesModel->where('canonicalName', $canonicalName)->select('*')->orderBy('showOrder', 'ASC')->first();
		$data['serviceFeatures'] = $ServiceFeatureModel->select('featureID, featureTitle, featureDescription, featureIconUrl')->orderBy('showOrder', 'ASC')->limit(4)->get()->getResult();

		return view('frontend/services', $data);
	}

	public function works()
	{
		$ContactModel  = new AdminContact_model();
		$ProductModel = new AdminProduct_model();
		$ServicesModel = new AdminServices_model();
		$WorksModel  = new AdminWorks_model();

		$data['navProducts'] = $ProductModel->where('status', '1')->select('productID, canonicalName, productTitle, productImageUrl, menuProductImageUrl')->orderBy('showOrder', 'ASC')->limit(9)->get()->getResult();
		$data['navService'] = $ServicesModel->select('serviceID, canonicalName, serviceTitle')->orderBy('showOrder', 'ASC')->get()->getResult();
		$data['contactDetails'] = $ContactModel->where('contactType', 'main')->select('*')->first();

		$data['worksDetails'] = $WorksModel->distinct()
			->select("workID, canonicalName, projectTitle, workImageUrl, workTitle")
			->orderBy('showOrder', 'ASC')
			->limit(4)->get()->getResult();

		return view('frontend/works', $data);
	}

	public function projectsdetails($canonicalName)
	{
		$ContactModel  = new AdminContact_model();
		$ProductModel = new AdminProduct_model();
		$ServicesModel = new AdminServices_model();
		$WorksModel  = new AdminWorks_model();

		$data['navProducts'] = $ProductModel->where('status', '1')->select('productID, canonicalName, productTitle, productImageUrl, menuProductImageUrl')->orderBy('showOrder', 'ASC')->limit(9)->get()->getResult();
		$data['navService'] = $ServicesModel->select('serviceID, canonicalName, serviceTitle')->orderBy('showOrder', 'ASC')->get()->getResult();
		$data['contactDetails'] = $ContactModel->where('contactType', 'main')->select('*')->first();

		$data['projectsDetails'] = $WorksModel->distinct()
			->select("OW.workID, OW.workCategoryID, OW.canonicalName, OW.projectTitle, OW.workImageUrl, OW.projectLocation, OW.services, OW.projectType, OW.strategy, OW.workTitle, OW.projectDate, OW.workDescription, OW.workLongDescription, OW.workBnnerImageUrl, OW.twitterLink, OW.faceBookLink, OW.linkedInLink, OW.pinterestLink, WC.categoryName")
			->from('our_works as OW')
			->join('work_category as WC', 'OW.workCategoryID = WC.categoryID')
			->where('OW.canonicalName', $canonicalName)
			->orderBy('OW.showOrder', 'ASC')
			->limit(4)->first();

		$data['galleryImages'] = [];
		$data['relatedProjects'] = [];
		if (isset($data['projectsDetails']) && (!empty($data['projectsDetails'])) && isset($data['projectsDetails']['workID'])) {
			$data['galleryImages'] = $WorksModel->getGalleryImage($data['projectsDetails']['workID']);

			$data['relatedProjects'] = $WorksModel->distinct()
				->select("OW.workID, OW.workCategoryID, OW.canonicalName, OW.projectTitle, OW.workImageUrl, WC.categoryName")
				->from('our_works as OW')
				->join('work_category as WC', 'OW.workCategoryID = WC.categoryID')
				->where('OW.workID !=', $data['projectsDetails']['workID'])
				->orderBy('OW.showOrder', 'ASC')
				->limit(2)->get()->getResult();
		} else {

			return redirect()->to('../works');
		}

		// print_r($data['relatedProjects']);
		// die();

		return view('frontend/projects-details', $data);
	}

	public function products($canonicalName = null)
	{
		$ContactModel  = new AdminContact_model();
		$ProductModel = new AdminProduct_model();
		$ServicesModel = new AdminServices_model();
		$ProductTypesModel = new AdminProductTypes_model();
		$ProductTypeDetailsModel = new AdminProductTypeDetails_model();

		$data['navProducts'] = $ProductModel->where('status', '1')->select('productID, canonicalName, productTitle, productImageUrl, menuProductImageUrl')->orderBy('showOrder', 'ASC')->limit(9)->get()->getResult();
		$data['navService'] = $ServicesModel->select('serviceID, canonicalName, serviceTitle')->orderBy('showOrder', 'ASC')->get()->getResult();
		$data['contactDetails'] = $ContactModel->where('contactType', 'main')->select('*')->first();


		$data['allProducts'] = $ProductModel->where('status', '1')->select('productID, canonicalName, productTitle, productImageUrl')->orderBy('showOrder', 'ASC')->get()->getResult();

		$data['productID'] = '';
		$data['selectedProductID'] = '';
		$data['productTypeDetails'] = [];
		$data['canonicalName'] = $canonicalName;

		if (!empty($data['allProducts'])) {

			$productID = $ProductModel->where('canonicalName', !empty($canonicalName) ? $canonicalName : $data['allProducts'][0]->canonicalName)->select('productID')->first();
			$data['productID'] = $productID['productID'];
			$data['selectedProductID'] = !empty($productID) ? $productID['productID'] : $data['allProducts'][0]->productID;
			$data['productDetails'] = $ProductModel->distinct()
				->select("P.productID, P.productTypeIDs, P.materialID, P.canonicalName, P.productTitle, P.productImageUrl, P.productDescription, P.productBannerImageUrl, PM.materialName")
				->from('products as P')
				->join('product_material as PM', 'P.materialID = PM.materialID')
				->where('P.productID', $data['selectedProductID'])
				->orderBy('P.showOrder', 'ASC')
				->limit(2)->first();

			$data['galleryImages'] = $ProductModel->getGalleryImage($data['selectedProductID']);

			$productTypeIDs = $data['productDetails']['productTypeIDs'];
			$productTypeIDsArray = explode(',', $productTypeIDs);

			$data['productTypes'] = $ProductTypesModel->select('productTypeID, typeTitle')
				->whereIn('productTypeID', $productTypeIDsArray)->get()->getResult();

			if (!empty($this->request->getVar('producttype'))) {
				$data['productTypeDetails'] = $ProductTypeDetailsModel->select('typeDetailID, productID, productTypeID, typeDetailTitle, typeDetailImageUrl')
					->where('productID', $data['selectedProductID'])
					->where('productTypeID', $this->request->getVar('producttype'))->get()->getResult();
			} else {
				$data['productTypeDetails'] = $ProductTypeDetailsModel->select('typeDetailID, productID, productTypeID, typeDetailTitle, typeDetailImageUrl')
					->where('productID', $data['selectedProductID'])
					->whereIn('productTypeID', $productTypeIDsArray)->get()->getResult();
			}
			// echo $ProductTypeDetailsModel->getLastQuery()->getQuery();die();
		} else {
			$data['productDetails'] = [];
			$data['galleryImages'] = [];
			$data['productTypes'] = [];
			$data['productTypeDetails'] = [];
		}

		// print_r($data['productTypeDetails']);
		// die();
		return view('frontend/products', $data);
	}

	public function contact()
	{
		$session = session();
		$ContactModel  = new AdminContact_model();
		$ProductModel = new AdminProduct_model();
		$ServicesModel = new AdminServices_model();
		$UserContactDetailsModel = new UserContactDetails_model();

		$data['navProducts'] = $ProductModel->where('status', '1')->select('productID, canonicalName, productTitle, productImageUrl, menuProductImageUrl')->orderBy('showOrder', 'ASC')->limit(9)->get()->getResult();
		$data['navService'] = $ServicesModel->select('serviceID, canonicalName, serviceTitle')->orderBy('showOrder', 'ASC')->get()->getResult();
		$data['contactDetails'] = $ContactModel->where('contactType', 'main')->select('*')->first();

		$data['post'] = $_POST;
		if ($this->request->getMethod() === 'post') {
			if ($this->validateInput()) {
				$insertData = [
					'contactName' => $this->request->getVar('contactName'),
					'contactEmail' => $this->request->getVar('contactEmail'),
					'contactPhone' => $this->request->getVar('contactPhone'),
					'message' => $this->request->getVar('message'),
					'contactStatus' => '1',
					'contactStatusOn' => date('Y-m-d H:i:s'),
					'createdOn' => date('Y-m-d H:i:s'),
					'updatedOn' => date('Y-m-d H:i:s'),
				];
				$UserContactDetailsModel->insert($insertData);
				$data['post'] = '';
				$session->setFlashdata('successMessage', 'Successfully sent!!');
				return view('frontend/contacts', $data);
			} else {
				$data["validation"] = $this->validator->getErrors();
				// $session->setFlashdata('errorMessage', 'Something wrong. Please try again!');
				return view('frontend/contacts', $data);
			}
		} else {
			return view('frontend/contacts', $data);
		}
	}

	private function validateInput($id = null)
	{
		$validationArr['contactName'] = "required|min_length[2]";
		$validationArr['contactEmail'] = "required|max_length[254]|valid_email";
		$validationArr['contactPhone'] = "required|numeric|min_length[8]";

		return  $this->validate($validationArr);
	}
}
