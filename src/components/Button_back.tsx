'use client';
import Image from 'next/image';
import { useRouter } from 'next/navigation';

export function ButtonBack() {
  const router = useRouter();

  return (
    <>
      <button onClick={() => router.back()} className="cursor-pointer group">
        <Image
          src="/image/community_icon/backIcon.svg"
          alt="이전페이지"
          width={16}
          height={16}
          className="opacity-50 w-4 group-hover:opacity-80"
        ></Image>
      </button>
    </>
  );
}
