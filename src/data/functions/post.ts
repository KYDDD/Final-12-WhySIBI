import { ApiResPromise, Post, PostReply } from '@/types';

const API_URL = process.env.NEXT_PUBLIC_API_URL;
const CLIENT_ID = process.env.NEXT_PUBLIC_CLIENT_ID || '';

/**
 * 게시판 타입에 해당하는 게시글 목록을 가져옵니다.
 * @param {string} boardType - 게시판 타입(예: notice, free 등)
 * @returns {Promise<ApiRes<Post[]>>} - 게시글 목록 응답 객체
 */
export async function getPosts(
  boardType: string,
  token?: string,
): ApiResPromise<Post[]> {
  try {
    const res = await fetch(`${API_URL}/posts?type=${boardType}`, {
      headers: {
        Authorization: `Bearer ${token}`,
        'Client-Id': CLIENT_ID,
      },
      // cache: 'no-cache',
      next: {
        tags: [`posts?type=${boardType}`],
      },
    });

    if (!res.ok) {
      const text = await res.text(); // 응답이 JSON이 아닐 수도 있음
      console.error('API 응답 에러', res.status, text);
      return { ok: 0, message: `서버 오류 (${res.status})` };
    }

    const json = await res.json();
    console.log('getPost 요청', json);
    return json;
  } catch (error) {
    console.error(error);
    return { ok: 0, message: '일시적인 네트워크 문제로 등록에 실패했습니다.' };
  }
}

/**
 * 특정 게시글의 상세 정보를 가져옵니다.
 * @param {number} _id - 게시글의 고유 ID
 * @returns {Promise<ApiRes<Post>>} - 게시글 상세 정보 응답 객체
 */
export async function getPost(
  _id: number,
  token?: string,
): ApiResPromise<Post> {
  try {
    const res = await fetch(`${API_URL}/posts/${_id}`, {
      headers: {
        Authorization: `Bearer ${token}`,
        'Client-Id': CLIENT_ID,
      },
      // cache: 'no-cache',
      next: {
        tags: [`posts/${_id}`],
      },
    });
    return res.json();
  } catch (error) {
    // 네트워크 오류 처리
    console.error(error);
    return { ok: 0, message: '일시적인 네트워크 문제로 등록에 실패했습니다.' };
  }
}

/**
 * 특정 게시글의 댓글 목록을 가져옵니다.
 * @param {number} _id - 게시글의 고유 ID
 * @returns {Promise<ApiRes<PostReply[]>>} - 댓글 목록 응답 객체
 */
export async function getReplies(_id: number): ApiResPromise<PostReply[]> {
  try {
    const res = await fetch(`${API_URL}/posts/${_id}/replies`, {
      headers: {
        'Client-Id': CLIENT_ID,
      },
      next: {
        tags: [`posts/${_id}/replies`],
      },
    });
    return res.json();
  } catch (error) {
    // 네트워크 오류 처리
    console.error(error);
    return { ok: 0, message: '일시적인 네트워크 문제로 등록에 실패했습니다.' };
  }
}
