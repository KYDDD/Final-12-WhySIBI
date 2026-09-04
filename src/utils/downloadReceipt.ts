'use client';

import { jsPDF } from 'jspdf';
import { OrderItem } from '@/types/order';

/**
 * 주문 영수증 PDF를 생성하고 다운로드합니다.
 *
 * Chrome은 `data:` URL로의 최상위 프레임 이동을 차단합니다(보안 정책).
 * 그래서 doc.output('datauri') 또는 window.location.href = 'data:...' 방식 대신
 * doc.save()를 사용합니다. save()는 내부적으로 Blob URL + <a download>를 사용하므로
 * 브라우저 보안 정책에 걸리지 않습니다.
 */
export function downloadOrderReceipt(order: OrderItem): void {
  const doc = new jsPDF({ unit: 'pt', format: 'a4' });

  const pageWidth = doc.internal.pageSize.getWidth();
  const margin = 56;
  const contentWidth = pageWidth - margin * 2;
  let y = 60;

  const line = () => {
    doc.setDrawColor(200, 200, 200);
    doc.line(margin, y, margin + contentWidth, y);
    y += 12;
  };

  // 제목
  doc.setFontSize(22);
  doc.setFont('helvetica', 'bold');
  doc.text('Order Receipt', pageWidth / 2, y, { align: 'center' });
  y += 32;

  // 주문 번호 / 날짜
  doc.setFontSize(10);
  doc.setFont('helvetica', 'normal');
  doc.setTextColor(100, 100, 100);
  doc.text(`Order #${order._id}`, margin, y);
  const dateStr = new Date(order.createdAt).toLocaleDateString('ko-KR', {
    year: 'numeric',
    month: 'long',
    day: 'numeric',
  });
  doc.text(dateStr, margin + contentWidth, y, { align: 'right' });
  y += 20;
  line();

  // 배송지
  doc.setFontSize(11);
  doc.setFont('helvetica', 'bold');
  doc.setTextColor(30, 30, 30);
  doc.text('Shipping Address', margin, y);
  y += 16;
  doc.setFontSize(10);
  doc.setFont('helvetica', 'normal');
  doc.text(order.address.name, margin, y);
  y += 14;
  doc.text(order.address.value, margin, y);
  y += 20;
  line();

  // 상품 목록 헤더
  doc.setFontSize(11);
  doc.setFont('helvetica', 'bold');
  doc.setTextColor(30, 30, 30);
  doc.text('Items', margin, y);
  y += 16;

  // 상품 목록
  doc.setFontSize(10);
  doc.setFont('helvetica', 'normal');
  for (const product of order.products) {
    if (y > 740) {
      doc.addPage();
      y = 60;
    }
    doc.setTextColor(30, 30, 30);
    doc.text(product.name, margin, y);
    doc.text(
      `${product.price.toLocaleString()} won`,
      margin + contentWidth,
      y,
      { align: 'right' },
    );
    y += 16;
  }
  y += 4;
  line();

  // 비용 요약
  const costs = [
    { label: 'Products', value: order.cost.products },
    { label: 'Shipping', value: order.cost.shippingFees },
    {
      label: 'Discount',
      value: -(order.cost.discount?.products ?? 0),
      highlight: true,
    },
  ];
  doc.setFontSize(10);
  for (const row of costs) {
    doc.setFont('helvetica', 'normal');
    doc.setTextColor(row.highlight ? 220 : 80, row.highlight ? 50 : 80, 80);
    doc.text(row.label, margin, y);
    doc.text(`${row.value.toLocaleString()} won`, margin + contentWidth, y, {
      align: 'right',
    });
    y += 16;
  }

  // 총 결제 금액
  y += 4;
  doc.setFontSize(12);
  doc.setFont('helvetica', 'bold');
  doc.setTextColor(30, 30, 30);
  doc.text('Total', margin, y);
  doc.text(
    `${order.cost.total.toLocaleString()} won`,
    margin + contentWidth,
    y,
    { align: 'right' },
  );
  y += 24;
  line();

  // 푸터
  doc.setFontSize(9);
  doc.setFont('helvetica', 'normal');
  doc.setTextColor(150, 150, 150);
  doc.text('Thank you for your purchase!', pageWidth / 2, y + 12, {
    align: 'center',
  });

  // save()는 내부적으로 Blob URL + <a download> 트릭을 사용합니다.
  // window.location.href = 'data:...' 방식이 아니므로 Chrome 보안 정책에 걸리지 않습니다.
  doc.save(`receipt-${order._id}.pdf`);
}
