import { Post } from '@/types';

// 예시 게시글 데이터 (더미데이터)
export const dummyHousePosts: Post[] = [
  {
    _id: 1,
    user: {
      _id: 1,
      name: 'yeonho',
    },
    title: '유럽 에어비엔비처럼 꾸민 자취방',
    content:
      '모노톤을 중심으로 꾸며진 감각적인 원룸 인테리어로, 흑백과 그레이 계열의 차분한 색감이 공간 전반을 채우고 있습니다. 수납형 침대와 메탈 캐비닛, 유리 테이블, 가죽 소파 등 심플한 가구를 배치해 실용성과 디자인을 동시에 살렸으며, 벽에 걸린 블랙 기타와 액자, 건조 화병 등의 소품으로 감성을 더했습니다. 암체어 플로어램프와 벽면 조명이 조화롭게 배치되어 따뜻한 분위기를 연출하고, 어두운 원목 바닥과 블라인드가 공간을 더욱 정돈된 느낌으로 완성합니다.',
    image: [
      '/image/room_photo/europeShowroom.png',
      '/image/room_photo/detail/europe_detail1.webp',
      '/image/room_photo/detail/europe_detail2.webp',
      '/image/room_photo/detail/europe_detail3.webp',
      '/image/room_photo/detail/europe_detail4.webp',
      '/image/room_photo/detail/europe_detail5.webp',
      '/image/room_photo/detail/europe_detail6.webp',
    ],
    isLiked: 0,
    views: 10,
    repliesCount: 100,
    tag: ['투룸', '1개', '반셀프'],
    type: '',
    createdAt: '',
    updatedAt: '',
  },
  {
    _id: 2,
    user: {
      _id: 2,
      name: 'hayeong',
    },
    title: '제주 게스트하우스 느낌으로 꾸민 룸',
    content:
      '따뜻한 조명과 소박한 소품으로 꾸민 이 방은 제주 게스트하우스 특유의 아늑한 분위기를 담고 있습니다. 바닥에 직접 깔린 침구와 자연스러운 구김의 이불, 빈티지한 테이블과 램프, 작은 식물과 책들이 더해져 편안하고 여유로운 감성이 느껴집니다. 전반적으로 꾸미지 않은 듯 자연스러운 배치가 공간에 소소한 여행지의 무드를 완성합니다.',
    image: [
      '/image/room_photo/jejuShowroom.png',
      '/image/room_photo/detail/jeju_detail1.png',
      '/image/room_photo/detail/jeju_detail2.webp',
      '/image/room_photo/detail/jeju_detail3.webp',
      '/image/room_photo/detail/jeju_detail4.webp',
      '/image/room_photo/detail/jeju_detail5.webp',
      '/image/room_photo/detail/jeju_detail6.webp',
    ],
    isLiked: 0,
    views: 10,
    repliesCount: 100,
    tag: ['투룸', '2개', '셀프', '강아지'],
    type: '',
    createdAt: '',
    updatedAt: '',
  },
  {
    _id: 3,
    user: {
      _id: 3,
      name: 'hyunsoo',
    },
    title: '18평 빌라에서 만든 초록색 신혼집',
    content:
      '초록색을 포인트로 한 내추럴 무드의 원룸 인테리어로, 숲을 연상시키는 사진과 식물 소품들이 벽을 가득 채워 자연 속에 있는 듯한 분위기를 만듭니다. 침구와 베개도 그린 계열로 맞춰 편안함을 강조했으며, 작은 책상과 의자가 아늑하게 배치되어 있어 휴식과 작업을 동시에 할 수 있는 감성적인 공간입니다.',
    image: [
      '/image/room_photo/greenShowroom.png',
      '/image/room_photo/detail/green_detail1.webp',
      '/image/room_photo/detail/green_detail2.webp',
      '/image/room_photo/detail/green_detail3.webp',
      '/image/room_photo/detail/green_detail4.webp',
      '/image/room_photo/detail/green_detail5.webp',
      '/image/room_photo/detail/green_detail6.webp',
    ],
    isLiked: 0,
    views: 10,
    repliesCount: 100,
    tag: ['투룸', '2개', '전문가', '조류'],
    type: '',
    createdAt: '',
    updatedAt: '',
  },
  {
    _id: 4,
    user: {
      _id: 4,
      name: 'yujin',
    },
    title: '식물과 빈티지 소품으로 꾸민 8층 복층',
    content:
      '내추럴한 우드 톤과 식물, 빈티지 소품으로 꾸민 8층 복층 구조의 공간입니다. 하얀 소파와 짜임이 돋보이는 러그, 원목 테이블이 따뜻한 분위기를 연출하며, 블랙 램프와 철제 트롤리, 계단 아래 수납공간까지 실용성과 감성이 조화를 이룹니다. 복층의 구조를 살려 아늑하고 세련된 거실 공간을 완성한 인테리어입니다.',
    image: [
      '/image/room_photo/whiteShowroom.png',
      '/image/room_photo/detail/white_detail1.webp',
      '/image/room_photo/detail/white_detail2.webp',
      '/image/room_photo/detail/white_detail3.webp',
      '/image/room_photo/detail/white_detail4.webp',
      '/image/room_photo/detail/white_detail5.webp',
      '/image/room_photo/detail/white_detail6.webp',
    ],
    isLiked: 0,
    views: 10,
    repliesCount: 100,
    tag: ['복층', '2개', '반셀프', '고양이'],
    type: '',
    createdAt: '',
    updatedAt: '',
  },
];
