package com.thyp.main;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;
import java.util.Map;
import java.util.Vector;

import org.apache.poi.xssf.usermodel.XSSFCell;
import org.apache.poi.xssf.usermodel.XSSFRow;
import org.apache.poi.xssf.usermodel.XSSFSheet;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;
import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;

import com.thyp.models.Xslx;

public class UrlImages {
	
	private int cp = 0;
	private List identify;
	private Vector<String> images = new Vector<>();
	private List<Xslx> listPeople = new ArrayList<>();

	public Vector<String> allImages(String url) throws MalformedURLException, IOException{
		
		String line = null;
		StringBuffer html = new StringBuffer();
		BufferedReader r = new BufferedReader(new InputStreamReader(new URL(url).openStream()));
	    while ((line = r.readLine()) != null) {
	    	html.append(line);
	    }
	    Document document = Jsoup.parse(html.toString().trim());
	    Elements elements = document.body().select("enclosure");

	    for (Element element : elements) {
	        images.add(element.attr("url"));
	    }
	    return images;
	}
	
	
	public List identifyImages(String directory) throws IOException{
		
		identify = new ArrayList();   
		int index = 0;
		File xlsx = new File(directory);
		FileInputStream fis = new FileInputStream(xlsx);
		XSSFWorkbook wb = new XSSFWorkbook(fis);
		XSSFSheet sheet = wb.getSheetAt(0);
		 Iterator rows = sheet.rowIterator();  
		 while (rows.hasNext()){    
			 XSSFRow row = (XSSFRow) rows.next();
			 Iterator cells = row.cellIterator();   
			 List data = new ArrayList();      
			 while (cells.hasNext()) {    
				 XSSFCell cell = (XSSFCell) cells.next();
				 data.add(cell); 
			 }
			 if(index!=0){
				 Xslx xslx = new Xslx();
				 xslx.setHorodateur(data.get(0)+"");
				 if((data.get(1)+"").length()>0){
					 int nb = Integer.parseInt((data.get(1)+"").substring(0,(data.get(1)+"").indexOf('.')));
					 if(cp<nb)
						 cp=nb;
					 xslx.setIdPhoto(nb);
				 }
				 else{
					 xslx.setIdPhoto(-1);
				 }
				 xslx.setNom(data.get(2)+"");
				 xslx.setPrenom(data.get(3)+"");
				 xslx.setMail(data.get(4)+"");
				 xslx.setLoginGithub(data.get(5)+"");
				 xslx.setLoginDiigo(data.get(6)+"");
				 xslx.setJavascript(data.get(7)+"");
				 xslx.setCSS(data.get(8)+"");
				 xslx.setHTML(data.get(9)+"");
				 xslx.setPHP(data.get(10)+"");
				 xslx.setSVG(data.get(11)+"");
				 xslx.setOWL(data.get(12)+"");
				 xslx.setJAVA(data.get(13)+"");
				 xslx.setXml(data.get(14)+"");
				 xslx.setSCALA(data.get(15)+"");
				 xslx.setNET(data.get(16)+"");
				 xslx.setJSON(data.get(17)+"");
				 xslx.setObjectiveC(data.get(18)+"");
				 xslx.setAndroid(data.get(19)+"");
				 xslx.setPageLinkedIn(data.get(20)+"");
				 xslx.setLoginTwitter(data.get(21)+"");

				 
				 identify.add(xslx);
			 }
			 else{
				 identify.add(data);
				 index++;
			 }
			  
		}
		
		return identify;
	}
	
	public List<Xslx> people() throws IOException{
		identifyImages("C:/Users/Malak BEN RAHHAL/Desktop/workspace/THYP/Gestion du document numerique/PartageImage/src/Profil Etudiants 1516 .xlsx");
		for (int i = 0; i <= length()+1; i++) {
			System.out.println(((Xslx)identify.get(i+1)));
			listPeople.add(((Xslx)identify.get(i+1)));
		}
		return listPeople;
	}
	
	public int length(){
		return cp;
	}
	
	public static void main(String[] args) throws Exception {
	    UrlImages images = new UrlImages();
	    System.out.println(images.allImages("https://picasaweb.google.com/data/feed/base/user/117590660096025980525/albumid/6202430039697759777?alt=rss&kind=photo&hl=fr"));
	}
}