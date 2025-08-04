export interface ProductExtra {
  isNew?: boolean;
  isBest?: boolean;
  color?: string[];
  size?: string[];
  keyword?: string;
  category?: string[];
  tag?: string;
  sort?: number;
  isLike?: boolean;
  originalPrice?: number;
  detailimg?: { path: string }[];
  star?: number;
}

export interface ProductImage {
  path: string;
  name: string;
  originalname: string;
}
export interface Product {
  // 상품 고유 ID
  _id: number;
  // 상품 가격
  price: number;
  // 상품 제목
  name: string;
  mainImages: ProductImage[];
}
export interface ProductListProps {
  // 상품 고유 ID
  _id: number;
  // 상품 가격
  price: number;
  // 상품 제목
  name: string;
  //리뷰 개수
  replies: number;
  //상품 판매갯수
  buyQuantity: number;
  //상품 메인 이미지
  mainImages: ProductImage[];
  //상품 엑스트라 정보
  extra?: ProductExtra;
  //상품 등록일
  createdAt: string;

  //북마크 ID
  myBookmarkId?: number;

  //상품 검색 키워드
  keyword: string[];

}
export interface ProductList {
  // 상품 고유 ID
  list: ProductListProps[];
}

export interface Pagination {
  page: number;
  limit: number;
  total: number;
  totalPages: number;
}

export interface ProductListResponse {
  ok: number;
  message?: string;
  item: ProductListProps[];
  pagination: Pagination;
}

/**
 * 게시글 작성/수정 폼에서 사용하는 타입
 * - Partial<Pick<Post, 'type' | 'title' | 'content' | '_id'>>: Post 타입에서 type, title, content, _id만 선택해 모두 옵셔널로 만듦
 * - image, tags는 옵션
 */
// export type PostForm = Partial<
//   Pick<Product, 'price' | 'name' | '_id' | 'mainImages'>
// > & {
//   // 상품 이미지
//   image?: string | string[];
//   // 게시글 태그(쉼표로 구분된 문자열)
//   tags?: string;
// };
