package br.edu.unifcv.faculdade.service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import br.edu.unifcv.faculdade.model.Livro;
import br.edu.unifcv.faculdade.repository.LivroRepository;
import br.edu.unifcv.faculdade.service.exception.RecursoNaoEncontradoException;
import br.edu.unifcv.faculdade.service.exception.RegraDeNegocioException;

@Service
public class LivroService implements CrudService<Livro, Long>{

	@Autowired
	LivroRepository livroRepository;
	
	@Override
	public List<Livro> getAll() {
		return livroRepository.findAll();
	}

	@Override
	public Optional<Livro> findById(Long id) {
		Optional<Livro> livro = livroRepository.findById(id);
		if (livro.isPresent()) {
			return livro;
		}
		throw new RecursoNaoEncontradoException("Livro com o id " + id.toString() + " não encontrado.");
	}

	@Override
	public Livro saveOrUpdate(Livro object) {
		if (object.getNome() == null) {
			throw new RegraDeNegocioException("Preencha o nome.");
		}
		if (object.getPublicacao() == null) {
			throw new RegraDeNegocioException("Preencha a data da publicação.");
		}
		
		return livroRepository.save(object);
	}

	@Override
	public void delete(Livro object) {
		livroRepository.delete(object);
	}

	@Override
	public void deleteById(Long id) {
		livroRepository.deleteById(id);
	}
}
