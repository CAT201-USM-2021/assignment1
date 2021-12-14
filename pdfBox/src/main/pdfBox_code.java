package pdfBox.src.main;

import java.io.File;
import java.io.IOException;
import org.apache.pdfbox.cos.COSDocument;
import org.apache.pdfbox.io.RandomAccessFile;
import org.apache.pdfbox.pdfparser.PDFParser;
import org.apache.pdfbox.pdmodel.PDDocument;
import org.apache.pdfbox.text.PDFTextStripper;
import java.io.PrintWriter;

public class pdfBox_code {
    public static void main(String[] args) throws IOException {
        
        File file = new File("pdfBox/src/uploads/toBeConverted.pdf");
        String text;
        PDFParser parser = new PDFParser(new RandomAccessFile(file, "r"));
        parser.parse();

        COSDocument cosDoc = parser.getDocument();
        PDFTextStripper pdfStrip = new PDFTextStripper();
        PDDocument pdDoc = new PDDocument(cosDoc);
        text = pdfStrip.getText(pdDoc);

        PrintWriter priWri = new PrintWriter("pdfBox/src/uploads/converted.txt");
        priWri.print(text);
        priWri.close();
    }
}

